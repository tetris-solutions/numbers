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
                    'names' => json_encode([
                        'en' => 'Cost',
                        'pt-BR' => 'Custo'
                    ]),
                    'type' => 'currency'
                ],
                [
                    'id' => 'clicks',
                    'names' => json_encode([
                        'en' => 'Clicks',
                        'pt-BR' => 'Cliques'
                    ]),
                    'type' => 'quantity'
                ],
                [
                    'id' => 'impressions',
                    'names' => json_encode([
                        'en' => 'Impressions',
                        'pt-BR' => 'Impressões'
                    ]),
                    'type' => 'quantity'
                ],
                [
                    'id' => 'ctr',
                    'names' => json_encode([
                        'en' => 'Click-through rate',
                        'pt-BR' => 'CTR'
                    ]),
                    'type' => 'percentage'
                ]
            ])
            ->save();

        $dateAttr = [
            'property' => 'Date',
            'names' => [
                'en' => 'Date',
                'pt-BR' => 'Data'
            ],
            'is_dimension' => true,
            'is_filter' => false
        ];

        $this->table('report')
            ->insert([
                [
                    'id' => 'CAMPAIGN_PERFORMANCE_REPORT',
                    'attributes' => json_encode([
                        'id' => [
                            'property' => 'CampaignId',
                            'names' => [
                                'en' => 'Campaign',
                                'pt-BR' => 'Campanha'
                            ],
                            'is_dimension' => true,
                            'is_filter' => true
                        ],
                        'date' => $dateAttr
                    ])
                ],
                [
                    'id' => 'ACCOUNT_PERFORMANCE_REPORT',
                    'attributes' => json_encode([
                        'date' => $dateAttr
                    ])
                ],
                [
                    'id' => 'GENERIC',
                    'attributes' => json_encode([])
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
                    'eval' => '(int)$data->Impressions'
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
