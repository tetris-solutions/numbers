<?php
namespace Tetris\Numbers;

use stdClass;

function aggregateResult(array $rows, array $reportConfig): array
{
    $groupedByKey = [];
    $result = [];

    $getKeyForGrouping = function (stdClass $row) use ($reportConfig): string {
        $dimensionValues = array_map(function ($dimension) use ($row) {
            return $row->{$dimension};
        }, $reportConfig['dimensions']);

        return implode('::', $dimensionValues);
    };

    foreach ($rows as $row) {
        $key = $getKeyForGrouping($row);

        if (!array_key_exists($key, $groupedByKey)) {
            $groupedByKey[$key] = [];
        }

        $groupedByKey[$key][] = $row;
    }

    foreach ($groupedByKey as $groupOfRows) {
        $row = new stdClass();
//        $row->_source = $groupOfRows;

        foreach ($reportConfig['dimensions'] as $dimensionName) {
            $row->{$dimensionName} = isset($groupOfRows[0]->{$dimensionName})
                ? $groupOfRows[0]->{$dimensionName}
                : NULL;
        }

        foreach ($reportConfig['metrics'] as $metric) {
            $source = MetaData::getMetricSource('adwords', 'Campaign', $metric['id']);

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