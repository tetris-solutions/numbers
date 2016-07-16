<?php
namespace Tetris\Numbers;

use stdClass;

trait EvalResolver
{
    protected static function evalMetric($result, array $report): stdClass
    {
        $fn = function () {
            return null;
        };

        $result = is_array($result)
            ? (object)$result
            : $result;

        // if $result is not a object (eg. a simple float)
        // create a new object to make it so
        if (is_scalar($result)) {
            if (count($report['fields']) !== 1) {
                throw new \Exception('Could not read report response', 500);
            }

            $obj = new stdClass();
            $obj->{$report['fields'][0]} = $result;
            $result = $obj;
        }

        $row = new stdClass();

        foreach ($report['dimensions'] as $dimension) {
            $row->{$dimension} = isset($result->{$dimension})
                ? $result->{$dimension}
                : NULL;
        }

        foreach ($report['metrics'] as $metric) {
            $fnBody = $metric['eval'];

            if (substr($fnBody, -1) !== ';') {
                $fnBody .= ';';
            }

            if (strpos($fnBody, 'return ') === false) {
                $fnBody = 'return ' . $fnBody;
            }

            eval('$fn = function ($data) { ' . "\n{$fnBody}\n" . ' };');

            $row->{$metric['id']} = $fn($result);
        }

//        $row->__source = $result;

        return $row;
    }
}