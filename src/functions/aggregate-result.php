<?php
namespace Tetris\Numbers;

use stdClass;

function aggregateResult(array $rows, array $reportConfig): array
{
    $groupedByKey = [];

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

    http_response_code(500);
    exit(json_encode($groupedByKey, JSON_PRETTY_PRINT));
}