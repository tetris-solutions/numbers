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
        $rows = [];

        $reports = $query->getReports();

        foreach ($reports as $reportName => $config) {
            $results = [];
            $ids = is_array($query->filters['id'])
                ? $query->filters['id']
                : [$query->filters['id']];

            if ($query->entity === 'Campaign') {
                foreach ($ids as $id) {
                    $campaign = new Campaign($id);
                    $results[] = $campaign->getInsights(array_keys($config['fields']), [
                        'level' => 'campaign',
                        'time_range' => [
                            'since' => $query->since->format('Y-m-d'),
                            'until' => $query->until->format('Y-m-d')
                        ]
                    ]);
                }

            } else if ($query->entity === 'Account') {
                foreach ($ids as $id) {
                    $account = new AdAccount($id);
                    $results[] = $account->getInsights(array_keys($config['fields']), [
                        'level' => 'account',
                        'time_range' => [
                            'since' => $query->since->format('Y-m-d'),
                            'until' => $query->until->format('Y-m-d')
                        ]
                    ]);
                }
            } else {
                throw new \Exception("Entity {$query->entity} not implemented, etc", 501);
            }

            foreach ($results as $result) {
                foreach ($result as $insights) {
                    $translatedInsights = new stdClass();

                    foreach ($config['fields'] as $sourceField => $targetField) {
                        $translatedInsights->{$targetField} = $insights->{$sourceField};
                    }

                    $rows[] = parseMetrics($translatedInsights, $config);
                }
            }
        }

        return $rows;
    }
}