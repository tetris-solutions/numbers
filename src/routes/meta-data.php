<?php

namespace Tetris\Numbers;

use Slim\Http\Request;
use Slim\Http\Response;
use Tetris\Numbers\Report\MetaData\MetaData;

function metaDataRouteHandler(string $action): callable
{
    return secured($action, function (Request $request, Response $response, array $params) {
        $entity = $request->getQueryParam('entity');
        $platform = $request->getQueryParam('platform');
        $attributes = MetaData::listAttributes($platform, $entity);

        return $response->withJson(isset($params['attribute'])
            ? $attributes[$params['attribute']]
            : $attributes);
    });
}

global $app;

$app->get('/meta', metaDataRouteHandler('get-meta-data'));
$app->get('/meta-data', metaDataRouteHandler('get-meta-data'));
$app->get('/meta-data/{attribute}', metaDataRouteHandler('get-attribute-meta-data'));
