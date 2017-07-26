<?php

namespace Tetris\Numbers;

use Tetris\Numbers\Base\Parser\RatioParser;
use Tetris\Numbers\Base\Sum\RatioSum;
use Tetris\Numbers\Base\Sum\VideoQuartileSum;
use Tetris\Numbers\Base\Sum\WeightedSum;

function prettyVarExport($var, $level = 0)
{
    $padString = ' ';
    $indent = str_pad('', $level, $padString, STR_PAD_LEFT);
    $nextIndent = str_pad('', $level + 4, $padString, STR_PAD_LEFT);

    switch (gettype($var)) {
        case "string":
            return '"' . addcslashes($var, "\\\$\"\r\n\t\v\f") . '"';
        case "array":
            $indexed = array_keys($var) === range(0, count($var) - 1);
            $rows = [];

            foreach ($var as $key => $value) {
                if ($value instanceof \Closure) {
                    $sanitizedValue = $value($nextIndent);
                } else if (is_array($value)) {
                    $sanitizedValue = prettyVarExport($value, $level + 4);
                } else {
                    $sanitizedValue = prettyVarExport($value, $level);
                }

                $rows[] = $nextIndent . ($indexed
                        ? ""
                        : prettyVarExport($key) . " => "
                    ) . $sanitizedValue;
            }

            return "[\n" . implode(",\n", $rows) . "\n" . $indent . "]";
        case "boolean":
            return $var ? "TRUE" : "FALSE";
        default:
            return var_export($var, TRUE);
    }
}

function customRatioSum(string $dividendMetric, string $divisorMetric): array
{
    return [
        'traits' => [
            'sum' => RatioSum::class
        ],
        'dividendMetric' => $dividendMetric,
        'divisorMetric' => $divisorMetric,
        "inferred_from" => [$dividendMetric, $divisorMetric]
    ];
}

function weightedAverage(string $metric, string $weight): array
{
    return [
        'traits' => [
            'sum' => WeightedSum::class
        ],
        'weightMetric' => $weight,
        "inferred_from" => [$weight]
    ];
}

function videoQuartileSum(string $percent): array
{
    $quartile = "videoquartile{$percent}rate";

    return [
        'traits' => [
            'sum' => VideoQuartileSum::class
        ],
        'videoViewsMetric' => 'videoviews',
        'videoQuartileMetric' => $quartile,
        "inferred_from" => ['videoviews']
    ];
}

function customRatioParser(string $dividend, string $divisor)
{
    $both = [$dividend, $divisor];

    return [
        'traits' => [
            'parser' => RatioParser::class
        ],
        'dividendProperty' => $dividend,
        'divisorProperty' => $divisor,
        'fields' => $both
    ];
}