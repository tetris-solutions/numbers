#!/usr/bin/env php
<?php

namespace Tetris\Numbers;

use Tetris\Numbers\Generator\Generator;
use Tetris\Numbers\Generator\Shared\MetricFactory;
use Tetris\Numbers\Generator\Shared\TransientAttribute;
use Tetris\Numbers\Generator\Shared\TransientMetric;

require __DIR__ . '/../vendor/autoload.php';

require 'includes/shared.php';
require 'includes/facebook.php';
require 'includes/adwords.php';
require 'includes/analytics.php';

function clearSource($source)
{
    return MetricFactory::clear(
        $source instanceof TransientMetric
            ? $source->asArray()
            : $source);
}

function updateConfig()
{
    $platforms = [
        'facebook' => getFacebookConfig(),
        'adwords' => getAdwordsConfig(),
        'analytics' => getAnalyticsConfig()
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

        /**
         * @var TransientMetric|array $source
         */
        foreach ($config['sources'] as $source) {
            $entity = strtolower($source['entity']);

            file_put_contents(
                __DIR__ . "/../config/{$platform}/sources/{$entity}/{$source['metric']}.php",
                "<?php\nreturn " . prettyVarExport(clearSource($source)) . ";\n"
            );
        }

        foreach ($config['reports'] as $reportName => $report) {
            /**
             * @var TransientAttribute|array $attribute
             */
            foreach ($report['attributes'] as $id => $attribute) {
                if ($attribute instanceof TransientAttribute) {
                    $attribute = $attribute->asArray();
                }

                file_put_contents(
                    __DIR__ . "/../config/{$platform}/reports/{$reportName}/{$id}.php",
                    "<?php\nreturn " . prettyVarExport($attribute) . ";\n"
                );
            }
        }
    }

    Generator::dump();
}

updateConfig();
