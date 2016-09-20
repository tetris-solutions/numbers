#!/usr/bin/env php
<?php

namespace Tetris\Numbers;

require __DIR__ . '/../vendor/autoload.php';

function genLocales()
{
    $adwordReports = json_decode(file_get_contents(__DIR__ . '/../vendor/tetris/adwords/src/Tetris/Adwords/report-mappings.json'), true);
    $facebook = json_decode(file_get_contents(__DIR__ . '/../maps/insight-fields.json'), true);
    $actionTypes = json_decode(file_get_contents(__DIR__ . '/../maps/facebook-action-types.json'), true);

    $adwords = [];

    foreach ($adwordReports as $adwordReport) {
        $adwords = array_merge($adwords, $adwordReport);
    }

    $locales = ['pt-BR', 'en'];

    foreach ($locales as $locale) {
        $outputPath = __DIR__ . "/../src/locales/{$locale}/fields.php";
        $oldFields = require($outputPath);

        $fields = [
            'adwords' => $oldFields['adwords'],
            'facebook' => array_merge($actionTypes, $oldFields['facebook'])
        ];

        foreach ($adwords as $name => $metadata) {
            if (!isset($fields['adwords'][$name])) {
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