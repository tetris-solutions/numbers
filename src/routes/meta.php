<?php
namespace Tetris\Numbers;

use Slim\Http\Request;
use Slim\Http\Response;

global $app;

$app->get('/meta',
    secured(function (Request $request, Response $response, array $params) {
        $entity = $request->getQueryParam('entity');
        $platform = $request->getQueryParam('platform');

        return $response->withJson(MetaData::listAttributes($platform, $entity));
    }));