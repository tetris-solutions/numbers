<?php

namespace Tetris\Numbers;

use Slim\Http\Request;
use Slim\Http\Response;
use Tetris\Numbers\Base\AttributeMetaData;
use stdClass;

function nullLess(array $ls): array
{
    return array_map(function (AttributeMetaData $source): stdClass {
        $metaData = new stdClass();

        foreach (get_object_vars($source) as $key => $value) {
            if (isset($value)) {
                $metaData->{$key} = $value;
            }
        }

        return $metaData;
    }, $ls);
}

global $app;

$metaDataRouteHandler = function (string $action): callable {
    return secured($action, function (Request $request, Response $response, array $params) {
        $entity = $request->getQueryParam('entity');
        $platform = $request->getQueryParam('platform');
        $attributes = nullLess(MetaData::listAttributes($platform, $entity));

        return $response->withJson(isset($params['attribute'])
            ? $attributes[$params['attribute']]
            : $attributes);
    });
};

$app->get('/v2/meta-data', secured('get-meta-data-v2',
    function (Request $request, Response $response, array $params) {
        $entity = $request->getQueryParam('entity');
        $platform = $request->getQueryParam('platform');
        $attributes = nullLess(MetaDataV2::listAttributes($platform, $entity));

        return $response->withJson(isset($params['attribute'])
            ? $attributes[$params['attribute']]
            : $attributes);
    }));

$app->get('/meta', $metaDataRouteHandler('get-meta-data'));
$app->get('/meta-data', $metaDataRouteHandler('get-meta-data'));
$app->get('/meta-data/{attribute}', $metaDataRouteHandler('get-attribute-meta-data'));
