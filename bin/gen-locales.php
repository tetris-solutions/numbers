#!/usr/bin/env php
<?php

namespace Tetris\Numbers;

use Tetris\Adwords\ReportMap;

require __DIR__ . '/../vendor/autoload.php';

function genLocales()
{
    $adwordReports = ReportMap::list();
    $facebook = array_merge(
        json_decode(file_get_contents(__DIR__ . '/../maps/breakdowns.json'), true),
        json_decode(file_get_contents(__DIR__ . '/../maps/insight-fields.json'), true)
    );
    $analytics = json_decode(file_get_contents(__DIR__ . '/../maps/analytics-fields.json'), true);
    $vtex = json_decode(file_get_contents(__DIR__ . '/../maps/vtex-order-fields.json'), true);
    $actionTypes = json_decode(file_get_contents(__DIR__ . '/../maps/facebook-action-types.json'), true);

    $adwords = [];

    foreach ($adwordReports as $reportName) {
        $adwords = array_merge($adwords, ReportMap::get($reportName));
    }

    $locales = ['pt-BR', 'en'];

    $fbInferredDateParts = [
        'month',
        'year',
        'week',
        'day_of_week',
        'month_of_year',
        'quarter'
    ];

    foreach ($fbInferredDateParts as $part) {
        $facebook[$part] = $facebook['date_start'];
    }

    foreach ($locales as $locale) {
        $outputPath = __DIR__ . "/../src/locales/{$locale}/fields.php";
        $oldFields = require($outputPath);

        $fields = [
            'analytics' => $oldFields['analytics'] ?? [],
//            'vtex' => $oldFields['vtex'] ?? [],
            'vtex' => [],
            'adwords' => $oldFields['adwords'],
            'facebook' => array_merge($actionTypes, $oldFields['facebook'])
        ];

        foreach ($analytics as $name => $metadata) {
            $oldName = $fields['analytics'][$name] ?? null;

            if (!$oldName) {
                $fields['analytics'][$name] = $metadata['uiName'];
            }
        }

        foreach ($vtex as $name => $metadata) {
            $oldName = $fields['vtex'][$name] ?? null;

            if (!$oldName) {
                $fields['vtex'][$name] = $metadata['uiName'];
            }
        }

        foreach ($adwords as $name => $metadata) {
            $oldName = $fields['adwords'][$name] ?? null;
            if (!$oldName) {
                $fields['adwords'][$name] = $metadata['DisplayName'];
            }
        }

        foreach ($facebook as $name => $metadata) {
            if (!isset($fields['facebook'][$name])) {
                $fields['facebook'][$name] = ucwords(str_replace('_', ' ', $name));
            }
        }

        ksort($fields['adwords']);
        ksort($fields['facebook']);
        ksort($fields['analytics']);

        $content = "<?php\nreturn [\n";

        foreach ($fields as $platform => $list) {
            $content .= "    '{$platform}' => [\n";

            foreach ($list as $id => $name) {
                $name = addslashes($name);
                $content .= "        '{$id}' => '{$name}',\n";
            }

            $content .= "    ],\n";
        }

        $content .= "];";

        file_put_contents($outputPath, $content);
    }
}

genLocales();
