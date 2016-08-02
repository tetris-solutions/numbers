#!/usr/bin/env php
<?php

namespace Tetris\Numbers;

require __DIR__ . '/../vendor/autoload.php';

$adwords = json_decode(file_get_contents(__DIR__ . '/../vendor/tetris/adwords/src/Tetris/Adwords/report-mappings.json'), true);
$facebook = json_decode(file_get_contents(__DIR__ . '/../maps/insight-fields.json'), true);
$actionTypes = json_decode(file_get_contents(__DIR__ . '/../maps/facebook-action-types.json'), true);

$adwords = array_merge($adwords['CAMPAIGN_PERFORMANCE_REPORT'], $adwords['ACCOUNT_PERFORMANCE_REPORT']);

$fields = [
    'adwords' => [],
    'facebook' => $actionTypes
];

foreach ($adwords as $name => $metadata) {
    $fields['adwords'][$name] = $metadata['DisplayName'];
}

foreach ($facebook as $name => $metadata) {
    $fields['facebook'][$name] = ucwords(str_replace('_', ' ', $name));
}

ksort($fields['adwords']);
ksort($fields['facebook']);

$content = "<?php\nreturn [\n";

foreach ($fields as $platform => $list) {
    $content .= "  '{$platform}' => [\n";

    foreach ($list as $id => $name) {
        $name = addslashes($name);
        $content .= "    '{$id}' => '{$name}',\n";
    }

    $content .= "  ],\n";
}

$content .= "];";

file_put_contents(__DIR__ . '/../src/locales/en/fields.php', $content);
file_put_contents(__DIR__ . '/../src/locales/pt-BR/fields.php', $content);

