#!/usr/bin/env php
<?php

namespace Tetris\Numbers;

require 'includes/facebook.php';
require 'includes/adwords.php';

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
                $sanitizedValue = $value instanceof \Closure
                    ? $value($nextIndent)
                    : prettyVarExport($value, $indent + 4);

                $rows[] = $nextIndent . ($indexed
                        ? ""
                        : prettyVarExport($key) . " => "
                    ) . $sanitizedValue;
            }

            return "[\n" .
            implode(",\n{$indent}", $rows) .
            "\n" . $indent . "]";
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
    chdir(__DIR__ . '/../src/config');
    exec('find -type f -exec rm {} \;');
    chdir($cwd);

    foreach ($platforms as $platform => $config) {
        foreach ($config['metrics'] as $id => $metric) {
            if (isset($metrics[$id]) && $metric['type'] !== $metric['type']) {
                echo "metric type mismatch {$metric['type']} <> {$metrics[$id]['type']}\n";
            }

            file_put_contents(
                __DIR__ . "/../src/config/metrics/{$metric['id']}.php",
                "<?php\nreturn " . prettyVarExport($metric) . ";\n"
            );
        }

        foreach ($config['sources'] as $source) {
            $entity = strtolower($source['entity']);

            file_put_contents(
                __DIR__ . "/../src/config/{$platform}/sources/{$entity}/{$source['metric']}.php",
                "<?php\nreturn " . prettyVarExport($source) . ";\n"
            );
        }

        foreach ($config['reports'] as $reportName => $report) {
            foreach ($report['attributes'] as $id => $attribute) {
                file_put_contents(
                    __DIR__ . "/../src/config/{$platform}/reports/{$reportName}/{$id}.php",
                    "<?php\nreturn " . prettyVarExport($attribute) . ";\n"
                );
            }
        }
    }
}

updateConfig();
