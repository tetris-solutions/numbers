<?php

namespace Tetris\Numbers;

use Slim\Http\Request;
use Slim\Http\Response;
use Tetris\Numbers\Base\Attribute;
use stdClass;
use Tetris\Numbers\Report\MetaData\MetaDataV2;

function nullLess(array $ls): array
{
    return array_map(function (Attribute $source): stdClass {
        $metaData = new stdClass();

        foreach (get_object_vars($source) as $key => $value) {
            if (isset($value)) {
                $metaData->{$key} = $value;
            }
        }

        return $metaData;
    }, $ls);
}

function metaDataRouteHandlerV2(string $action)
{
    return secured($action, function (Request $request, Response $response, array $params) {
        $entity = $request->getQueryParam('entity');
        $platform = $request->getQueryParam('platform');
        $attributes = nullLess(MetaDataV2::listAttributes($platform, $entity));

        return $response->withJson((object)(isset($params['attribute'])
            ? $attributes[$params['attribute']]
            : $attributes));
    });
}

global $app;

$app->get('/v2/meta-data', metaDataRouteHandlerV2('get-meta-data-v2'));
$app->get('/v2/meta-data/{attribute}', metaDataRouteHandlerV2('get-attribute-meta-data-v2'));