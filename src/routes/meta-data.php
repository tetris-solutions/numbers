<?php
namespace Tetris\Numbers;

use Slim\Http\Request;
use Slim\Http\Response;

global $app;

$metaDataRouteHandler = secured(function (Request $request, Response $response, array $params) {
    $entity = $request->getQueryParam('entity');
    $platform = $request->getQueryParam('platform');
    $attributes = MetaData::listAttributes($platform, $entity);

    return $response->withJson(isset($params['attribute'])
        ? $attributes[$params['attribute']]
        : $attributes);
});

$app->get('/meta', $metaDataRouteHandler);
$app->get('/meta-data', $metaDataRouteHandler);
$app->get('/meta-data/{attribute}', $metaDataRouteHandler);
