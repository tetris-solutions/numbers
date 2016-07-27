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
                ],
                [
                    'id' => 'raw'
                ]
            ])
            ->save();

        $map = json_decode(file_get_contents(__DIR__ . '/../src/adwords-map.json'), true);

        $this->table('entity')
            ->insert(array_map(function ($id) {
                return ['id' => $id];
            }, $map['entities']))
            ->save();

        $metrics = [];

        foreach ($map['metrics'] as $metric) {
            $metrics[] = [
                'id' => $metric['id'],
                'names' => json_encode($metric['names']),
                'type' => $metric['type']
            ];
        }

        $this->table('metric')
            ->insert($metrics)
            ->save();

        $reports = [];

        foreach ($map['reports'] as $report) {
            $reports[] = [
                'id' => $report['id'],
                'attributes' => json_encode($report['attributes'])
            ];
        }

        $this->table('report')
            ->insert($reports)
            ->save();

        $sources = [];
        foreach ($map['sources'] as $source) {
            $source['id'] = Shortid::generate();
            $source['fields'] = json_encode($source['fields']);
            $sources[] = $source;
        }

        $this->table('metric_source')
            ->insert($sources)
            ->save();
    }
}
