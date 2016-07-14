<?php
namespace Tetris\Numbers;

use Slim\Http\Request;
use Slim\Http\Response;

global $app;

/**
 * ?ad_account=9852914252
 *      &tetris_account=a0e77a0e-5b74-48dd-a325-ff4aa521d3ac
 *      &entity=Campaign
 *      &platform=adwords
 *      &metrics=cost,clicks,ctr
 *      &from=2016-07-01
 *      &to=2016-07-12
 *      &filters=id(185416194)
 *      &group_by=network
 */
$app->get('/',
    function (Request $request, Response $response, array $params) {
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
