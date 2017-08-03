<?php

namespace Tetris\Numbers\Report;

use Exception;
use stdClass;
use Tetris\Numbers\Base\Attribute;
use Tetris\Numbers\Base\FilterMetaData;
use Tetris\Numbers\Base\Metric;
use Tetris\Numbers\Base\Parsable;
use Tetris\Numbers\Base\Summable;
use Tetris\Numbers\Report\Query\Query;
use Tetris\Services\FlagsService;

abstract class ResultParser
{
    static function filter(array $allRows, array $filters): array
    {
        $matchingRows = [];

        foreach ($allRows as $row) {
            /**
             * @var FilterMetaData $filter
             */
            foreach ($filters as $filter) {
                if ($filter->id === 'id') {
                    continue; // platform level filter
                }

                $operator = $filter->spec[0];

                $A = $filter->spec[1];
                $B = $filter->spec[2] ?? NULL;

                if (!isset($row->{$filter->id})) continue;

                $rowValue = $row->{$filter->id};

                if (is_int($rowValue)) {
                    $A = isset($A) ? (int)$A : PHP_INT_MIN;
                    $B = isset($B) ? (int)$B : PHP_INT_MAX;
                }

                if (is_float($rowValue)) {
                    $A = isset($A) ? (float)$A : PHP_INT_MIN;
                    $B = isset($B) ? (float)$B : PHP_INT_MAX;
                }

                if ($operator === 'equals' && $rowValue != $A) {
                    continue 2;
                }

                if ($operator === 'not equals' && $rowValue == $A) {
                    continue 2;
                }

                if ($operator === 'greater than' && $rowValue < $A) {
                    continue 2;
                }

                if ($operator === 'less than' && $rowValue > $A) {
                    continue 2;
                }

                if ($operator === 'between' && !($rowValue >= $A && $rowValue <= $B)) {
                    continue 2;
                }

                if (
                    $operator === 'contains' &&

                    !(is_string($rowValue) &&
                        stripos($rowValue, $A) !== FALSE) &&

                    !(is_array($rowValue) &&
                        in_array($A, $rowValue))
                ) {
                    continue 2;
                }
            }

            $matchingRows[] = $row;
        }

        return $matchingRows;
    }

    private static function isDebugMode()
    {
        $envFlag = getenv('INCLUDE_SOURCE');

        if ($envFlag) {
            $flag = strtolower($envFlag);

            switch ($flag) {
                case 'true':
                    return true;
                case 'false':
                    return false;
            }
        }

        if (!isset($GLOBALS['app'])) {
            return false;
        }

        /**
         * @var FlagsService $flags
         */
        $flags = $GLOBALS['app']->getContainer()->flags;

        return $flags->isDebugMode();
    }

    static function parse($receivedObject, Query $query): stdClass
    {
        $report = $query->report;
        if (is_array($receivedObject)) {
            $receivedObject = (object)$receivedObject;
        }

        // if $result is not a object (eg. a simple float)
        // create a new object to make it so
        if (is_scalar($receivedObject)) {
            if (count($report->fields) > 1) {
                // if the result contains only one field and we requested more,
                // something went wrong
                throw new Exception('Could not read report response', 500);
            }

            $tmpObject = new stdClass();
            $fieldNames = array_values($report->fields);
            $tmpObject->{$fieldNames[0]} = $receivedObject;
            $receivedObject = $tmpObject;
        }

        $row = new stdClass();

        if (self::isDebugMode()) {
            $row->__source__ = $receivedObject;
        }

        /**
         * @var Attribute $attribute
         */
        foreach ($report->dimensions as $attribute) {
            $row->{$attribute->id} = $attribute instanceof Parsable
                ? $attribute->parse($receivedObject, $query)
                : null;
        }

        /**
         * @var Metric $metric
         */
        foreach ($report->metrics as $metric) {
            $row->{$metric->id} = $metric instanceof Parsable
                ? $metric->parse($receivedObject, $query)
                : null;
        }

        return $row;
    }

    static function aggregate(array $rows, array $dimensionIds, array $metrics): array
    {
        $groupedByKey = [];
        $result = [];

        $getKeyForGrouping = function ($row) use ($dimensionIds): string {
            $dimensionValues = array_map(function ($dimension) use ($row) {
                return $row->{$dimension} ?? NULL;
            }, $dimensionIds);

            return implode('::', $dimensionValues);
        };

        foreach ($rows as $row) {
            $key = $getKeyForGrouping($row);
            $key = empty($key) ? '_' : $key;

            if (!array_key_exists($key, $groupedByKey)) {
                $groupedByKey[$key] = [];
            }

            $groupedByKey[$key][] = $row;
        }

        foreach ($groupedByKey as $key => $groupOfRows) {
            if (count($groupOfRows) === 1) {
                $row = $groupOfRows[0];
                $result[] = $row;

                continue;
            }

            $row = new stdClass();

            if (self::isDebugMode()) {
                $row->__source__ = $groupOfRows;
                $row->__key__ = $key;
            }

            foreach ($dimensionIds as $dimensionId) {
                $row->{$dimensionId} = $groupOfRows[0]->{$dimensionId} ?? NULL;
            }

            /**
             * @var Metric $metric
             */
            foreach ($metrics as $metricId => $metric) {
                $row->{$metricId} = $metric instanceof Summable
                    ? $metric->sum($groupOfRows)
                    : NULL;
            }

            $result[] = $row;
        }
        return $result;
    }
}
