<?php
namespace Tetris\Numbers;

use Facebook\GraphNodes\GraphEdge;
use Facebook\GraphNodes\GraphNode;
use FacebookAds\ApiRequest;
use FacebookAds\Cursor;
use FacebookAds\Object\AdsInsights;
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

    function resolve(Query $query, bool $shouldAggregate): array
    {
        $report = $query->report;

        $rows = [];
        $requestFields = $report->fields;
        $params = [
            'limit' => 5000,
            'breakdowns' => [],
            'time_range' => [
                'since' => $query->since->format('Y-m-d'),
                'until' => $query->until->format('Y-m-d')
            ]
        ];

        if (isset($requestFields['date_start'])) {
            $params['time_increment'] = 1;
        }

        foreach ($requestFields as $field => $name) {
            if (in_array($field, self::$breakdowns)) {
                unset($requestFields[$field]);
                $params['breakdowns'][] = $field;
            }
        }

        $classes = [
            'adset' => AdSet::class,
            'campaign' => Campaign::class,
            'ad' => Ad::class
        ];

        $entityLower = strtolower($query->entity);

        if ($shouldAggregate) {
            $params['level'] = 'account';
            $params['filtering'] = [[
                'field' => "{$entityLower}.id",
                'operator' => 'IN',
                'value' => $query->filters['id']
            ]];

            $instance = new AdAccount($query->adAccountId);
            $results = $instance->getInsights(array_keys($requestFields), $params);
        } else {
//            $params['filtering'] = [[
//                'field' => "{$entityLower}.id",
//                'operator' => 'IN',
//                'value' => $query->filters['id']
//            ]];

            $params['fields'] = join(',', $requestFields);
            $idChunks = array_chunk($query->filters['id'], 50);
            $results = [];

            foreach ($idChunks as $ids) {
                $params['ids'] = join(',', $ids);

                $insightsReq = $this->sendRequest('GET', "/insights", $params);
                $edges = $insightsReq->getGraphNode()->all();

                /**
                 * @type GraphEdge $edge
                 */
                foreach ($edges as $id => $edge) {
                    /**
                     * @type array $node
                     */
                    foreach ($edge->asArray() as $node) {
                        $results[] = (object)$node;
                    }
                }
            }
        }

        foreach ($results as $insights) {
            $row = new stdClass();

            foreach ($report->fields as $sourceField => $targetField) {
                $row->{$targetField} = $insights->{$sourceField};
            }

            $rows[] = $row;
        }

        return $rows;
    }
}