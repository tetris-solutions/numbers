<?php

namespace Tetris\Numbers;

use Slim\Http\Request;
use Slim\Http\Response;

global $app;

$metaDataRouteHandler = function (string $action): callable {
    return secured($action, function (Request $request, Response $response, array $params) {
        $entity = $request->getQueryParam('entity');
        $platform = $request->getQueryParam('platform');
        $attributes = MetaData::listAttributes($platform, $entity);

        return $response->withJson(isset($params['attribute'])
            ? $attributes[$params['attribute']]
            : $attributes);
    });
};

$app->get('/v2/meta-data', secured('get-meta-data-v2',
    function (Request $request, Response $response, array $params) {
        $entity = $request->getQueryParam('entity');
        $platform = $request->getQueryParam('platform');
        $attributes = MetaDataV2::listAttributes($platform, $entity);

        return $response->withJson(isset($params['attribute'])
            ? $attributes[$params['attribute']]
            : $attributes);
    }));

$app->get('/meta', $metaDataRouteHandler('get-meta-data'));
$app->get('/meta-data', $metaDataRouteHandler('get-meta-data'));
$app->get('/meta-data/{attribute}', $metaDataRouteHandler('get-attribute-meta-data'));
