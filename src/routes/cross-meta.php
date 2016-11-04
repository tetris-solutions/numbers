<?php

namespace Tetris\Numbers;

use Slim\Http\Request;
use Slim\Http\Response;

global $app;

$app->get('/x/meta',
    function (Request $req, Response $res, array $params): Response {
        $entity = $req->getQueryParam('entity');
        $platforms = uniq(explode(',', $req->getQueryParam('platforms')));

        $replaceMap = require(__DIR__ . '/../cross-attributes.php');
        $byPlatform = [];
        $attributes = [];
        $inventory = [];

        $translate = function (string $platform, array $input) use ($replaceMap, &$inventory): array {
            $output = [];

            foreach ($input as $id => $config) {
                $replacement = isset($replaceMap[$platform][$id])
                    ? $replaceMap[$platform][$id]
                    : NULL;

                if ($replacement) {
                    $id = is_array($replacement)
                        ? $replacement[0]
                        : $replacement;
                }

                $config['id'] = $id;
                $output[$id] = $config;

                if (empty($inventory[$id])) {
                    $inventory[$id] = [$platform];
                } else {
                    $inventory[$id][] = $platform;
                }
            }

            return $output;
        };

        foreach ($platforms as $platform) {
            $byPlatform[$platform] = $translate($platform,
                MetaData::listAttributes($platform, $entity));
        }

        foreach ($inventory as $attributeId => $platformsAttributeAppearsIn) {
            if (count($platformsAttributeAppearsIn) === count($platforms)) {
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
                $config['requires_id'] = true;

                $attributes[$config['id']] = $config;
            }
        }

        return $res->withJson($attributes);
    });
