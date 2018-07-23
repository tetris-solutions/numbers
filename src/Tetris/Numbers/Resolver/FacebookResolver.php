<?php

namespace Tetris\Numbers\Resolver;

use Facebook\GraphNodes\GraphEdge;
use stdClass;
use FacebookAds\Api;
use Facebook\Facebook;
use Tetris\Numbers\Report\Query\Query;


class FacebookResolver extends Facebook implements Resolver
{
    private static $_breakdowns = null;

    function __construct(string $tetrisAccount, stdClass $accessToken)
    {
        parent::__construct([
            'app_id' => getenv('FB_APP_ID'),
            'app_secret' => getenv('FB_APP_SECRET'),
            'default_graph_version' => 'v3.0'
        ]);

        $this->setDefaultAccessToken($accessToken->access_token);

        Api::init(
            getenv('FB_APP_ID'),
            getenv('FB_APP_SECRET'),
            $accessToken->access_token
        );
    }

    static function getBreakdowns(): array
    {
        if (!self::$_breakdowns) {
            self::$_breakdowns = array_keys(json_decode(file_get_contents(__DIR__ . '/../../../../maps/breakdowns.json'), true));
        }

        return self::$_breakdowns;
    }

    static function isBreakdown(string $dimension)
    {
        return in_array($dimension, self::getBreakdowns());
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
            if (self::isBreakdown($field)) {
                unset($requestFields[$field]);
                $params['breakdowns'][] = $field;
            }
        }

        $params['fields'] = join(',', $requestFields);
        $idChunks = array_chunk($query->filters['id'], 50);

        foreach ($idChunks as $ids) {
            $params['ids'] = join(',', $ids);

            $edges = $this->sendRequest('GET', "/insights", $params)
                ->getGraphNode()->all();

            /**
             * @type GraphEdge $edge
             */
            foreach ($edges as $edge) {
                /**
                 * @type array $node
                 */
                foreach ($edge->asArray() as $node) {
                    $node['__source__'] = $node;
                    $rows[] = (object)$node;
                }
            }
        }

        foreach ($rows as $index => $row) {
            $translatedRow = new stdClass();

            foreach ($report->fields as $sourceField => $targetField) {
                $translatedRow->{$targetField} = $row->{$sourceField} ?? null;
            }

            $rows[$index] = $translatedRow;
        }

        return $rows;
    }
}