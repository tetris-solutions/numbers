#!/usr/bin/env php
<?php

namespace Tetris\Numbers;
function percentSum(string $dividendMetric, string $divisorMetric): array
{
    return [
        "inferred_from" => [$dividendMetric, $divisorMetric],
        "sum" => function (string $indent) use ($dividendMetric, $divisorMetric): string {
            return join(PHP_EOL . $indent, [
                'function (array $rows) {',
                '    $sumDividend = 0;',
                '    $sumDivisor = 0;',
                '    foreach ($rows as $row) {',
                "        \$sumDividend += \$row->$dividendMetric;",
                "        \$sumDivisor += \$row->$divisorMetric;",
                '    }',
                '    return (float)$sumDivisor !== 0.0',
                '        ? $sumDividend / $sumDivisor',
                '        : 0;',
                '}'
            ]);
        }
    ];
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

function updateConfig()
{
    $platforms = [
        'facebook' => getFacebookConfig(),
        'adwords' => getAdwordsConfig()
    ];

    $metrics = [];

    $cwd = getcwd();
    chdir(__DIR__ . '/../config');
    exec('find -type f -exec rm {} \;');
    chdir($cwd);

    foreach ($platforms as $platform => $config) {
        foreach ($config['metrics'] as $id => $metric) {
            if (isset($metrics[$id]) && $metric['type'] !== $metric['type']) {
                echo "metric type mismatch {$metric['type']} <> {$metrics[$id]['type']}\n";
            }

            file_put_contents(
                __DIR__ . "/../config/metrics/{$metric['id']}.php",
                "<?php\nreturn " . prettyVarExport($metric) . ";\n"
            );
        }

        foreach ($config['sources'] as $source) {
            $entity = strtolower($source['entity']);

            file_put_contents(
                __DIR__ . "/../config/{$platform}/sources/{$entity}/{$source['metric']}.php",
                "<?php\nreturn " . prettyVarExport($source) . ";\n"
            );
        }

        foreach ($config['reports'] as $reportName => $report) {
            foreach ($report['attributes'] as $id => $attribute) {
                file_put_contents(
                    __DIR__ . "/../config/{$platform}/reports/{$reportName}/{$id}.php",
                    "<?php\nreturn " . prettyVarExport($attribute) . ";\n"
                );
            }
        }
    }
}

require 'includes/facebook.php';
require 'includes/adwords.php';

updateConfig();
