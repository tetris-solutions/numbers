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

        $adwordsMap = json_decode(file_get_contents(__DIR__ . '/../maps/adwords.json'), true);
        $fbMap = json_decode(file_get_contents(__DIR__ . '/../maps/facebook.json'), true);

        $this->table('entity')
            ->insert(array_map(function ($id) {
                return ['id' => $id];
            }, $adwordsMap['entities']))
            ->save();

        $metrics = [];

        foreach ($adwordsMap['metrics'] as $metric) {
            $metrics[$metric['id']] = [
                'id' => $metric['id'],
                'names' => json_encode($metric['names']),
                'type' => $metric['type']
            ];
        }

        foreach ($fbMap['metrics'] as $metric) {
            if (isset($metrics[$metric['id']])) continue;

            $metrics[$metric['id']] = [
                'id' => $metric['id'],
                'names' => json_encode($metric['names']),
                'type' => $metric['type']
            ];
        }

        $this->table('metric')
            ->insert(array_values($metrics))
            ->save();

        $reports = array_merge($fbMap['reports'], $adwordsMap['reports']);
        $reports = array_map(function ($report) {
            return [
                'id' => $report['id'],
                'attributes' => json_encode($report['attributes'])
            ];
        }, $reports);

        $this->table('report')
            ->insert(array_values($reports))
            ->save();

        $sources = array_merge($fbMap['sources'], $adwordsMap['sources']);
        $sources = array_map(function ($source) {
            $source['id'] = Shortid::generate();
            $source['fields'] = json_encode($source['fields']);
            return $source;
        }, $sources);

        $this->table('metric_source')
            ->insert(array_values($sources))
            ->save();
    }
}
