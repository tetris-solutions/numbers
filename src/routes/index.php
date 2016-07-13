<?php
namespace Tetris\Numbers;

use Slim\Http\Request;
use Slim\Http\Response;

global $app;

$app->get('/',
    function (Request $request, Response $response, array $params): Response {
        $classes = [
            'adwords' => AdwordsResolver::class,
            'facebook' => FacebookResolver::class
        ];
        $query = new Query($request->getQueryParams());
        /**
         * @var TKMApi $tkm
         */
        $tkm = $this->tkm;
        $account = $tkm->getAccount($query->tetrisAccountId);
        $resolverClass = $classes[$query->platform];
        /**
         * @var Resolver $resolver
         */
        $resolver = new $resolverClass($query->tetrisAccountId, $account->token);

        return $response->withJson($resolver->resolve($query));
    });
