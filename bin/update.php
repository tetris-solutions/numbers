#!/usr/bin/env php
<?php

namespace Tetris\Numbers;

use Tetris\Numbers\Base\Attribute;
use Tetris\Numbers\Base\Parser\PlatformParser;
use Tetris\Numbers\Generator\Generator;
use Tetris\Numbers\Generator\Shared\MetricFactory;
use Tetris\Numbers\Generator\Shared\TransientAttribute;
use Tetris\Numbers\Generator\Shared\TransientMetric;

require __DIR__ . '/../vendor/autoload.php';

require 'includes/shared.php';
require 'includes/facebook.php';
require 'includes/adwords.php';
require 'includes/analytics.php';

function platformAttribute(string $platform, string $report): TransientAttribute
{
    $attribute = new TransientAttribute();

    $attribute->parent = Attribute::class;
    $attribute->platform = $platform;
    $attribute->path = "{$attribute->platform}/Attributes/{$report}";
    $attribute->id = 'platform';
    $attribute->type = 'string';
    $attribute->is_metric = false;
    $attribute->is_dimension = true;
    $attribute->traits['parser'] = PlatformParser::class;
    $source = makeParserFromSource('constant');
    $attribute->parse = $source(strtolower($platform));
    $attribute->names = [
        'en' => 'Platform',
        'pt-BR' => 'Plataforma'
    ];

    return $attribute;
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

            Generator::add($source);

            file_put_contents(
                __DIR__ . "/../config/{$platform}/sources/{$entity}/{$source['metric']}.php",
                "<?php\nreturn " . prettyVarExport(MetricFactory::clear($source->asArray())) . ";\n"
            );
        }

        foreach ($config['reports'] as $reportName => $report) {
            /**
             * @var TransientAttribute|array $attribute
             */
            foreach ($report['attributes'] as $id => $attribute) {
                Generator::add($attribute);

                file_put_contents(
                    __DIR__ . "/../config/{$platform}/reports/{$reportName}/{$id}.php",
                    "<?php\nreturn " . prettyVarExport($attribute->asArray()) . ";\n"
                );
            }
        }
    }

    Generator::dump();
}

updateConfig();
