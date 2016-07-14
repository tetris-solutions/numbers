<?php

use Phinx\Seed\AbstractSeed;
use PUGX\Shortid\Shortid;

class Minimal extends AbstractSeed
{
    public function run()
    {
        $this->table('platform')
            ->insert([
                [
                    'id' => 'facebook',
                    'name' => 'Facebook'
                ],
                [
                    'id' => 'adwords',
                    'name' => 'Google AdWords'
                ]
            ])
            ->save();

        $this->table('type')
            ->insert([
                [
                    'id' => 'quantity'
                ],
                [
                    'id' => 'currency'
                ],
                [
                    'id' => 'percentage'
                ]
            ])
            ->save();

        $this->table('entity')
            ->insert([
                [
                    'id' => 'Campaign',
                ],
                [
                    'id' => 'Account'
                ]
            ])
            ->save();

        $this->table('metric')
            ->insert([
                [
                    'id' => 'cost',
                    'name' => 'Cost',
                    'type' => 'currency'
                ],
                [
                    'id' => 'clicks',
                    'name' => 'Clicks',
                    'type' => 'quantity'
                ],
                [
                    'id' => 'impressions',
                    'name' => 'Impressions',
                    'type' => 'quantity'
                ],
                [
                    'id' => 'ctr',
                    'name' => 'Click-through rate',
                    'type' => 'percentage'
                ]
            ])
            ->save();

        $this->table('report')
            ->insert([
                [
                    'id' => 'CAMPAIGN_PERFORMANCE_REPORT',
                    'dimensions' => json_encode([
                        'network' => 'AdNetworkType1',
                        'date' => 'Date'
                    ]),
                    'filters' => json_encode([
                        'id' => 'CampaignId'
                    ])
                ],
                [
                    'id' => 'ACCOUNT_PERFORMANCE_REPORT',
                    'dimensions' => json_encode([
                        'network' => 'AdNetworkType1',
                        'date' => 'Date'
                    ])
                ],
                [
                    'id' => 'GENERIC'
                ]
            ])
            ->save();

        $this->table('metric_source')
            ->insert([
                [
                    'id' => Shortid::generate(),
                    'metric' => 'cost',
                    'entity' => 'Campaign',
                    'platform' => 'adwords',
                    'report' => 'CAMPAIGN_PERFORMANCE_REPORT',
                    'fields' => json_encode(['Cost']),
                    'eval' => '$data->Cost'
                ],
                [
                    'id' => Shortid::generate(),
                    'metric' => 'cost',
                    'entity' => 'Account',
                    'platform' => 'adwords',
                    'report' => 'ACCOUNT_PERFORMANCE_REPORT',
                    'fields' => json_encode(['Cost']),
                    'eval' => '$data->Cost'
                ],
                [
                    'id' => Shortid::generate(),
                    'metric' => 'clicks',
                    'entity' => 'Campaign',
                    'platform' => 'adwords',
                    'report' => 'CAMPAIGN_PERFORMANCE_REPORT',
                    'fields' => json_encode(['Clicks']),
                    'eval' => '(int)$data->Clicks'
                ],
                [
                    'id' => Shortid::generate(),
                    'metric' => 'ctr',
                    'entity' => 'Campaign',
                    'platform' => 'adwords',
                    'report' => 'CAMPAIGN_PERFORMANCE_REPORT',
                    'fields' => json_encode(['Ctr']),
                    'eval' => 'floatval(str_replace("%", "", $data->Ctr)) / 100'
                ],
                [
                    'id' => Shortid::generate(),
                    'metric' => 'impressions',
                    'entity' => 'Campaign',
                    'report' => 'CAMPAIGN_PERFORMANCE_REPORT',
                    'platform' => 'adwords',
                    'fields' => json_encode(['Impressions']),
                    'eval' => '$data->Impressions'
                ],
                [
                    'id' => Shortid::generate(),
                    'metric' => 'cost',
                    'entity' => 'Campaign',
                    'platform' => 'facebook',
                    'fields' => json_encode(['spend']),
                    'eval' => '$data->spend'
                ],
                [
                    'id' => Shortid::generate(),
                    'metric' => 'cost',
                    'entity' => 'Account',
                    'platform' => 'facebook',
                    'fields' => json_encode(['spend']),
                    'eval' => '$data->spend'
                ],
                [
                    'id' => Shortid::generate(),
                    'metric' => 'clicks',
                    'entity' => 'Campaign',
                    'platform' => 'facebook',
                    'fields' => json_encode(['clicks']),
                    'eval' => '$data->clicks'
                ],
                [
                    'id' => Shortid::generate(),
                    'metric' => 'ctr',
                    'entity' => 'Campaign',
                    'platform' => 'facebook',
                    'fields' => json_encode(['ctr']),
                    'eval' => '$data->ctr'
                ],
                [
                    'id' => Shortid::generate(),
                    'metric' => 'impressions',
                    'entity' => 'Campaign',
                    'platform' => 'facebook',
                    'fields' => json_encode(['impressions']),
                    'eval' => '$data->impressions'
                ]
            ])
            ->save();
    }
}
