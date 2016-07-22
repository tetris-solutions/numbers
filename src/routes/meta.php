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

$app->get('/meta',
    function (Request $request, Response $response, array $params) {
        /**
         * @var FlagsService $flags
         */
        $flags = $this->flags;
        $locale = $flags->getLocale();

        $ls = sql::run(sql::select([
            'metric_source.metric',
            'metric.names',
            'report.attributes'])
            ->from('metric_source')
            ->join('inner', 'report', 'report.id = metric_source.report')
            ->join('inner', 'metric', 'metric_source.metric = metric.id')
            ->where('metric_source.entity = ?', $request->getQueryParam('entity'))
            ->where('metric_source.platform = ?', $request->getQueryParam('platform')))
            ->fetchAll();

        $attributes = [];
        $dimensions = [];
        $filters = [];
        $metrics = [];

        foreach ($ls as $row) {
            $fields = json_decode($row['attributes'], true);

            foreach ($fields as $id => $attribute) {
                $attributes[$id] = [
                    'id' => $id,
                    'name' => $attribute['names'][$locale],
                    'is_metric' => false,
                    'is_dimension' => $attribute['is_dimension'],
                    'is_filter' => $attribute['is_filter']
                ];
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
                'is_metric' => true,
                'is_dimension' => false,
                'is_filter' => false
            ];
        }

        return $response->withJson([
            'metrics' => uniq($metrics),
            'dimensions' => uniq($dimensions),
            'filters' => uniq($filters),
            'attributes' => $attributes
        ]);
    });