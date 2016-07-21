<?php
namespace Tetris\Numbers;

use Slim\Http\Request;
use Slim\Http\Response;

global $app;

function uniq(array $s): array
{
    return array_values(array_unique($s));
}

$app->get('/meta',
    function (Request $request, Response $response, array $params) {
        $ls = sql::run(sql::select([
            'metric_source.metric',
            'report.dimensions',
            'report.filters'])
            ->from('metric_source')
            ->join('inner', 'report', 'report.id = metric_source.report')
            ->where('metric_source.entity = ?', $request->getQueryParam('entity'))
            ->where('metric_source.platform = ?', $request->getQueryParam('platform')))
            ->fetchAll();

        $metrics = [];
        $dimensions = [];
        $filters = [];

        foreach ($ls as $row) {
            $metrics[] = $row['metric'];
            $dimensions = array_merge($dimensions, array_keys(
                json_decode($row['dimensions'], true)
            ));
            $filters = array_merge($filters, array_keys(
                json_decode($row['filters'], true)
            ));
        }

        return $response->withJson([
            'metrics' => uniq($metrics),
            'dimensions' => uniq($dimensions),
            'filters' => uniq($filters)
        ]);
    });