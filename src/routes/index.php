<?php
namespace Tetris\Numbers;

use Slim\Http\Request;
use Slim\Http\Response;

global $app;

$app->get('/',
    function (Request $request, Response $response, array $params): Response {
        $query = $request->getQueryParams();
        
    });
