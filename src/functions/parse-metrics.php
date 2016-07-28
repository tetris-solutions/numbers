<?php

namespace Tetris\Numbers;

use stdClass;
use Exception;

function parseMetrics($receivedObject, array $requestedReport): stdClass
{
    $fn = function () {
        return null;
    };

    $receivedObject = is_array($receivedObject)
        ? (object)$receivedObject
        : $receivedObject;

    // if $result is not a object (eg. a simple float)
    // create a new object to make it so
    if (is_scalar($receivedObject)) {
        if (count($requestedReport['fields']) > 1) {
            // if the result contains only one field and we requested more,
            // something went wrong
            throw new Exception('Could not read report response', 500);
        }

        $tmpObject = new stdClass();
        $fieldNames = array_values($requestedReport['fields']);
        $tmpObject->{$fieldNames[0]} = $receivedObject;
        $receivedObject = $tmpObject;
    }

    $row = new stdClass();

    foreach ($requestedReport['dimensions'] as $dimension) {
        $row->{$dimension} = isset($receivedObject->{$dimension})
            ? $receivedObject->{$dimension}
            : NULL;
    }

    foreach ($requestedReport['metrics'] as $metric) {
        $fnBody = $metric['eval'];

        if (substr($fnBody, -1) !== ';') {
            $fnBody .= ';';
        }

        if (strpos($fnBody, 'return ') === false) {
            $fnBody = 'return ' . $fnBody;
        }

        eval('$fn = function ($data) { ' . "\n{$fnBody}\n" . ' };');

        $row->{$metric['id']} = $fn($receivedObject);
    }

    return $row;
}