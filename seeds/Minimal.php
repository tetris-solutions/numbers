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

        $this->table('metric_entity')
            ->insert([
                [
                    'id' => Shortid::generate(),
                    'metric' => 'cost',
                    'entity' => 'Campaign'
                ],
                [
                    'id' => Shortid::generate(),
                    'metric' => 'cost',
                    'entity' => 'Account'
                ],
                [
                    'id' => Shortid::generate(),
                    'metric' => 'clicks',
                    'entity' => 'Campaign'
                ],
                [
                    'id' => Shortid::generate(),
                    'metric' => 'ctr',
                    'entity' => 'Campaign'
                ],
                [
                    'id' => Shortid::generate(),
                    'metric' => 'impressions',
                    'entity' => 'Campaign'
                ]
            ])
            ->save();
    }
}
