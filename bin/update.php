#!/usr/bin/env php
<?php

namespace Tetris\Numbers;

use Tetris\Numbers\Base\Attribute;
use Tetris\Numbers\Base\Parser\PlatformParser;
use Tetris\Numbers\Generator\Generator;
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
    $attribute->names = [
        'en' => 'Platform',
        'pt-BR' => 'Plataforma'
    ];

    return $attribute;
}

function updateConfig()
{
    foreach ([getFacebookConfig(), getAdwordsConfig(), getAnalyticsConfig()] as $config) {
        /**
         * @var TransientMetric|array $source
         */
        foreach ($config['sources'] as $source) {
            Generator::add($source);
        }

        foreach ($config['reports'] as $reportName => $report) {
            /**
             * @var TransientAttribute|array $attribute
             */
            foreach ($report['attributes'] as $id => $attribute) {
                Generator::add($attribute);
            }
        }
    }

    Generator::dump();
}

updateConfig();
