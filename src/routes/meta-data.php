<?php

namespace Tetris\Numbers;

use Slim\Http\Request;
use Slim\Http\Response;
use Tetris\Numbers\Report\MetaData\MetaDataV2;

function metaDataRouteHandlerV2(string $action)
{
    return secured($action, function (Request $request, Response $response, array $params) {
        $entity = $request->getQueryParam('entity');
        $platform = $request->getQueryParam('platform');
        $attributes = MetaDataV2::listAttributes($platform, $entity);

        return $response->withJson((object)(isset($params['attribute'])
            ? $attributes[$params['attribute']]
            : $attributes));
    });
}

global $app;

$app->get('/meta-data', metaDataRouteHandlerV2('get-meta-data'));
$app->get('/meta-data/{attribute}', metaDataRouteHandlerV2('get-attribute-meta-data'));
