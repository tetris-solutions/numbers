<?php
namespace Tetris\Numbers;

use Slim\Http\Request;
use Slim\Http\Response;
use Tetris\Services\FlagsService;

global $app;

function uniq(array $s): array
{
    return array_values(array_unique($s));
}

function setBreakdownPermutation(&$config)
{
    switch ($config['id']) {
        case 'age':
            $config['pairs_with'] = ['gender'];
            break;
        case 'gender':
            $config['pairs_with'] = ['age'];
            break;
        case 'impression_device';
            $config['requires'] = $config['pairs_with'] = ['placement'];
            break;
        case 'placement':
            $config['required_by'] = $config['pairs_with'] = ['impression_device'];
            break;
        default:
            $config['pairs_with'] = [];

    }
}

$app->get('/meta',
    function (Request $request, Response $response, array $params) {
        /**
         * @var FlagsService $flags
         */
        $flags = $this->flags;
        $locale = $flags->getLocale();

        $entity = $request->getQueryParam('entity');
        $platform = $request->getQueryParam('platform');

        $ls = sql::run(sql::select([
            'metric_source.metric',
            'metric.names',
            'metric.type',
            'report.attributes'])
            ->from('metric_source')
            ->join('inner', 'report', 'report.id = metric_source.report')
            ->join('inner', 'metric', 'metric_source.metric = metric.id')
            ->where('metric_source.entity = ?', $entity)
            ->where('metric_source.platform = ?', $platform))
            ->fetchAll();

        $attributes = [];
        $dimensions = [];
        $filters = [];
        $metrics = [];

        foreach ($ls as $row) {
            $fields = json_decode($row['attributes'], true);

            foreach ($fields as $id => $attribute) {
                $config = [
                    'id' => $id,
                    'name' => $attribute['names'][$locale],
                    'is_metric' => $attribute['is_metric'],
                    'is_dimension' => $attribute['is_dimension'],
                    'is_filter' => $attribute['is_filter'],
                    'is_breakdown' => $platform === 'facebook' && in_array($id, FacebookResolver::$breakdowns)
                ];

                if ($config['is_breakdown']) {
                    setBreakdownPermutation($config);
                }

                $attributes[$id] = $config;

                if ($attribute['is_dimension']) {
                    $dimensions[] = $id;
                }

                if ($attribute['is_filter']) {
                    $filters[] = $id;
                }


            }

            $metrics[] = $metric = $row['metric'];
            $metricNames = json_decode($row['names'], true);

            $attributes[$metric] = [
                'id' => $metric,
                'name' => $metricNames[$locale],
                'metric_type' => $row['type'],
                'is_metric' => true,
                'is_dimension' => false,
                'is_filter' => false,
                'is_breakdown' => false
            ];
        }

        return $response->withJson([
            'metrics' => uniq($metrics),
            'dimensions' => uniq($dimensions),
            'filters' => uniq($filters),
            'attributes' => $attributes
        ]);
    });