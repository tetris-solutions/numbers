<?php
namespace Tetris\Numbers;

use stdClass;
use FacebookAds\Api;
use Facebook\Facebook;

class FacebookResolver extends Facebook implements Resolver
{
    function __construct(string $tetrisAccount, stdClass $accessToken)
    {
        parent::__construct([
            'app_id' => getenv('FB_APP_ID'),
            'app_secret' => getenv('FB_APP_SECRET')
        ]);

        $this->setDefaultAccessToken($accessToken->access_token);

        Api::init(
            getenv('FB_APP_ID'),
            getenv('FB_APP_SECRET'),
            $accessToken->access_token
        );

    }

    function resolve(Query $query): array
    {
        return [];
    }
}