<?php

namespace Tetris\Numbers;

use stdClass;
use Exception;

function parseMetrics($receivedObject, array $requestedReport): stdClass
{
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
//    $row->_source = $receivedObject;

    foreach ($requestedReport['dimensions'] as $dimensionName) {
        $row->{$dimensionName} = isset($receivedObject->{$dimensionName})
            ? $receivedObject->{$dimensionName}
            : NULL;
    }

    foreach ($requestedReport['metrics'] as $metric) {
        $val = $metric['parse']($receivedObject);
        $row->{$metric['id']} = $val;
    }

    return $row;
}
