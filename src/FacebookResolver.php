<?php
namespace Tetris\Numbers;

use stdClass;
use FacebookAds\Object\Campaign;
use FacebookAds\Object\AdAccount;
use FacebookAds\Api;
use Facebook\Facebook;

class FacebookResolver extends Facebook implements Resolver
{
    public static $breakdowns = [
        'age',
        'country',
        'gender',
        'frequency_value',
        'hourly_stats_aggregated_by_advertiser_time_zone',
        'hourly_stats_aggregated_by_audience_time_zone',
        'impression_device',
        'place_page_id',
        'placement',
        'product_id',
        'region'
    ];

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
            $requestFields = $config['fields'];
            $params = [
                'breakdowns' => [],
                'time_range' => [
                    'since' => $query->since->format('Y-m-d'),
                    'until' => $query->until->format('Y-m-d')
                ]
            ];

            if (isset($config['fields']['date_start'])) {
                $params['time_increment'] = 1;
            }

            foreach ($requestFields as $field => $name) {
                if (in_array($field, self::$breakdowns)) {
                    unset($requestFields[$field]);
                    $params['breakdowns'][] = $field;
                }
            }

            switch ($query->entity) {
                case 'Campaign':
                    $className = Campaign::class;
                    $params['level'] = 'campaign';
                    break;
                case 'Account':
                    $className = AdAccount::class;
                    $params['level'] = 'account';
                    break;
                default:
                    throw new \Exception("Entity {$query->entity} not implemented, etc", 501);
            }

            $ids = is_array($query->filters['id'])
                ? $query->filters['id']
                : [$query->filters['id']];

            foreach ($ids as $id) {
                /**
                 * @var Campaign|AdAccount $instance
                 */
                $instance = new $className($id);
                $results = $instance->getInsights(array_keys($requestFields), $params);

                foreach ($results as $insights) {
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