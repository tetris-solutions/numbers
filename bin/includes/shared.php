<?php

namespace Tetris\Numbers;

use Tetris\Numbers\Base\Parser\PercentParser;
use Tetris\Numbers\Base\Parser\RatioParser;
use Tetris\Numbers\Base\Sum\RatioSum;
use Tetris\Numbers\Base\Sum\VideoQuartileSum;
use Tetris\Numbers\Base\Sum\WeightedSum;

function makeParserFromSource($fname): callable
{
    return function (...$properties) use ($fname) {
        $source = file_get_contents(__DIR__ . '/parsers/' . $fname . '.php');
        $source = trim($source, "; \t\n\r\0\x0B");

        foreach ($properties as $index => $property) {
            $source = str_replace("PROPERTY{$index}_NAME", "'$property'", $source);
        }

        $startPos = strpos($source, 'function ');
        $lines = explode("\n", substr($source, $startPos));

        return function (string $indent) use ($lines): string {
            return join(PHP_EOL . $indent, $lines);
        };
    };
}

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
    $source = makeParserFromSource('percent-sum');

    return [
        'traits' => [
            'sum' => RatioSum::class
        ],
        'dividendMetric' => $dividendMetric,
        'divisorMetric' => $divisorMetric,
        "inferred_from" => [$dividendMetric, $divisorMetric],
        "sum" => $source($dividendMetric, $divisorMetric)
    ];
}

function weightedAverage(string $metric, string $weight): array
{
    $source = makeParserFromSource('weighted-average');

    return [
        'traits' => [
            'sum' => WeightedSum::class
        ],
        'weightMetric' => $weight,
        "inferred_from" => [$weight],
        "sum" => $source($metric, $weight)
    ];
}

function videoQuartileSum(string $percent): array
{
    $source = makeParserFromSource('video-quartile-sum');
    $quartile = "videoquartile{$percent}rate";

    return [
        'traits' => [
            'sum' => VideoQuartileSum::class
        ],
        'videoViewsMetric' => 'videoviews',
        'videoQuartileMetric' => $quartile,
        "inferred_from" => ['videoviews'],
        "sum" => $source($quartile, 'videoviews')
    ];
}

function simpleSum(string $metric): callable
{
    $source = makeParserFromSource('simple-sum');

    return $source($metric);
}

function customRatioParser(string $dividend, string $divisor)
{
    $both = [$dividend, $divisor];
    $source = makeParserFromSource('ratio');

    return [
        'traits' => [
            'parser' => RatioParser::class
        ],
        'dividendProperty' => $dividend,
        'divisorProperty' => $divisor,
        'fields' => $both,
        'parse' => $source($dividend, $divisor)
    ];
}