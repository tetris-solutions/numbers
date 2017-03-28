<?php

namespace Tetris\Numbers;

use Google_Client;
use Google_Service_Analytics;
use Google_Service_AnalyticsReporting;
use stdClass;

class AnalyticsResolver implements Resolver
{
    private $tetrisAccount;
    private $client;
    private $analytics;
    private $reporting;

    function __construct(string $tetrisAccount, stdClass $token)
    {
        $this->client = new Google_Client();
        $this->tetrisAccount = $tetrisAccount;
        $this->client->setAuthConfig(__DIR__ . '/../../analytics-google-client.json');
        $this->client->setAccessToken((array)$token);

        $this->analytics = new Google_Service_Analytics($this->client);
        $this->reporting = new Google_Service_AnalyticsReporting($this->client);
    }

    function resolve(Query $query, bool $aggregateMode): array
    {
        return [];
    }
}
