<?php
namespace Tetris\Numbers;

use stdClass;
use FacebookAds\Object\Campaign;
use FacebookAds\Object\AdSet;
use FacebookAds\Object\Ad;
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

        foreach ($query->reports as $reportName => $config) {
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

            $ids = $query->filters['id'];

            switch ($query->entity) {
                case 'Campaign':
                    if (isset($config['fields']['campaign_id'])) {
                        $className = Campaign::class;
                        $params['level'] = 'campaign';
                    } else {
                        $className = AdAccount::class;
                        $params['level'] = 'account';
                        $params['filtering'] = [[
                            'field' => 'campaign.id',
                            'operator' => 'IN',
                            'value' => $ids
                        ]];
                        $ids = [$query->adAccountId];
                    }
                    break;
                case 'AdSet':
                    if (isset($config['fields']['adset_id'])) {
                        $className = AdSet::class;
                        $params['level'] = 'adset';
                    } else {
                        $className = AdAccount::class;
                        $params['level'] = 'account';
                        $params['filtering'] = [[
                            'field' => 'adset.id',
                            'operator' => 'IN',
                            'value' => $ids
                        ]];
                        $ids = [$query->adAccountId];
                    }
                    break;
                case 'Ad':
                    if (isset($config['fields']['ad_id'])) {
                        $className = Ad::class;
                        $params['level'] = 'ad';
                    } else {
                        $className = AdAccount::class;
                        $params['level'] = 'account';
                        $params['filtering'] = [[
                            'field' => 'ad.id',
                            'operator' => 'IN',
                            'value' => $ids
                        ]];
                        $ids = [$query->adAccountId];
                    }
                    break;
                default:
                    throw new \Exception("Entity {$query->entity} not implemented, etc", 501);
            }

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