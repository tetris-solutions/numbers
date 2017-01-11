#!/usr/bin/env php
<?php

namespace Tetris\Numbers;

require 'includes/helpers.php';
require 'includes/facebook.php';
require 'includes/adwords.php';

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

updateConfig();
