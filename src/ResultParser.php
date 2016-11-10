<?php

namespace Tetris\Numbers;

use Exception;
use stdClass;
use Tetris\Services\FlagsService;

abstract class ResultParser
{
    static function filter(array $allRows, array $filters, array $auxiliaryProperties): array
    {
        $matchingRows = [];

        foreach ($allRows as $row) {
            foreach ($filters as $filter) {
                $field = $filter['id'];

                if ($field === 'id') continue;

                $operator = $filter['values'][0];

                $A = $filter['values'][1];
                $B = isset($filter['values'][2])
                    ? $filter['values'][2]
                    : NULL;

                if (!property_exists($row, $field)) continue;

                $rowValue = $row->{$field};

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

                if ($operator === 'greater than' && $rowValue < $A) {
                    continue 2;
                }

                if ($operator === 'less than' && $rowValue > $A) {
                    continue 2;
                }

                if ($operator === 'between' && !($rowValue >= $A && $rowValue <= $B)) {
                    continue 2;
                }

                if ($operator === 'contains' && stripos($rowValue, $A) === FALSE) {
                    continue 2;
                }
            }

            foreach ($auxiliaryProperties as $property) {
                unset($row->{$property});
            }

            $matchingRows[] = $row;
        }

        return $matchingRows;
    }

    private static function isDebugMode()
    {
        if (!isset($GLOBALS['app'])) {
            return false;
        }

        /**
         * @var FlagsService $flags
         */
        $flags = $GLOBALS['app']->getContainer()->flags;

        return $flags->isDebugMode();
    }

    static function parse($receivedObject, Report $report): stdClass
    {
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
            $row->_source = $receivedObject;
        }

        foreach ($report->dimensions as $attribute) {
            $dimensionId = $attribute['id'];
            $dimensionProperty = $attribute['property'];

            $parse = isset($attribute['parse'])
                ? $attribute['parse']
                : NULL;

            $value = isset($receivedObject->{$dimensionProperty})
                ? $receivedObject->{$dimensionProperty}
                : NULL;

            $row->{$dimensionId} = is_callable($parse)
                ? $parse($receivedObject)
                : $value;
        }

        foreach ($report->metrics as $metric) {
            $row->{$metric['id']} = $metric['parse']($receivedObject);
        }

        return $row;
    }

    static function aggregate(array $rows, array $dimensionIds, array $metrics): array
    {
        $groupedByKey = [];
        $result = [];

        $getKeyForGrouping = function (stdClass $row) use ($dimensionIds): string {
            $dimensionValues = array_map(function ($dimension) use ($row) {
                return isset($row->{$dimension}) ? $row->{$dimension} : NULL;
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
            $row = new stdClass();
            if (self::isDebugMode()) {
                $row->_source = $groupOfRows;
                $row->_key = $key;
            }

            foreach ($dimensionIds as $dimensionId) {
                $row->{$dimensionId} = isset($groupOfRows[0]->{$dimensionId})
                    ? $groupOfRows[0]->{$dimensionId}
                    : NULL;
            }

            foreach ($metrics as $metric) {
                try {
                    $source = MetaData::getMetricSource('adwords', $metric['entity'], $metric['id']);
                } catch (\Throwable $e) {
                    if ($e->getCode() === 404) {
                        $source = NULL;
                    }
                }

                if (isset($source['sum'])) {
                    $val = $source['sum']($groupOfRows);
                    $row->{$metric['id']} = $val;
                } else {
                    $row->{$metric['id']} = NULL;
                }
            }

            $result[] = $row;
        }

        return $result;
    }
}
