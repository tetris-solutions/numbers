<?php
namespace Tetris\Numbers;

use Slim\Http\Request;
use Slim\Http\Response;
use Tetris\Services\FlagsService;

global $app;

$app->get('/metrics/{platform}/{entity}',
    secured(function (Request $request, Response $response, array $params) {
        /**
         * @var FlagsService $flags
         */
        $flags = $this->flags;
        $locale = $flags->getLocale();

        $platform = $params['platform'];
        $entity = $params['entity'];
        $type = $request->getQueryParam('type');
        $limit = $request->getQueryParam('limit');

        $metricSources = MetaData::getSources($platform, $entity);

        $metrics = [];

        foreach ($metricSources as $source) {
            $metric = $source['metric'];
            $metricConfig = MetaData::getMetric($metric);

            if (!empty($type) && $metricConfig['type'] !== $type) continue;

            $metrics[$metric] = [
                'name' => MetaData::getFieldName($locale, $platform, $metric),
                'fields' => $source['fields']
            ];
        }

        ksort($metrics);
        $result = array_values($metrics);

        if (!empty($limit)) {
            $result = array_slice($result, 0, (int)$limit);
        }

        return $response->withJson($result);
    }));