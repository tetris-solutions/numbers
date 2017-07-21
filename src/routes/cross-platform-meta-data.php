<?php

namespace Tetris\Numbers;

use Slim\Http\Request;
use Slim\Http\Response;
use Tetris\Numbers\Report\MetaData\MetaData;

global $app;

$crossMetaRouteHandler = secured('get-cross-platform-meta-data', function (Request $req, Response $res, array $params): Response {
    $entity = $req->getQueryParam('entity');
    $platforms = uniq(explode(',', $req->getQueryParam('platforms')));

    $byPlatform = [];
    $attributes = [];
    $inventory = [];

    $translate = function (string $platform, array $input) use (&$inventory): array {
        $output = [];

        foreach ($input as $id => $config) {
            $replacement = MetaData::getAttributeMerge($id, $platform);
            $alternateId = $replacement['id'];

            $config['id'] = $alternateId;
            $output[$alternateId] = $config;

            if (empty($inventory[$alternateId])) {
                $inventory[$alternateId] = [$platform];
            } else {
                $inventory[$alternateId][] = $platform;
            }
        }

        return $output;
    };

    foreach ($platforms as $platform) {
        $byPlatform[$platform] = $translate($platform,
            MetaData::listAttributes($platform, $entity));
    }

    foreach ($inventory as $attributeId => $platformsAttributeAppearsIn) {
        if (count($platformsAttributeAppearsIn) >= count($platforms)) {
            $config = [];

            foreach ($platformsAttributeAppearsIn as $platform) {
                $config = array_merge($config, $byPlatform[$platform][$attributeId]);
            }

            $config['requires_id'] = false;
            $attributes[$attributeId] = $config;
        } else {
            $platform = $platformsAttributeAppearsIn[0];
            $config = $byPlatform[$platform][$attributeId];

            $config['id'] = "{$platform}:{$config['id']}";
            $config['requires_id'] = $platformsAttributeAppearsIn === ['analytics']
                ? false
                : true;

            $attributes[$config['id']] = $config;
        }
    }

    return $res->withJson($attributes);
});

$app->get('/x/meta', $crossMetaRouteHandler);
$app->get('/x/meta-data', $crossMetaRouteHandler);