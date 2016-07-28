<?php
namespace Tetris\Numbers;

use stdClass;
use FacebookAds\Object\Campaign;
use FacebookAds\Object\AdAccount;
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
        $result = [];

        $reports = $query->getReports();
        http_response_code(500);
        exit(json_encode([
            'query' => $query,
            'reports' => $reports
        ]));

        if ($query->entity === 'Campaign') {
            $ids = is_array($query->filters['id']) ? $query->filters['id'] : [$query->filters['id']];
            foreach ($ids as $id) {
                $campaign = new Campaign($id);
                $campaign->getInsights();
            }

        } else {
            throw new \Exception("Entity {$query->entity} not implemented, etc", 501);
        }

        return $result;
    }
}