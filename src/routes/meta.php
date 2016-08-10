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
            /* $config['requires'] = */
            $config['pairs_with'] = ['placement'];
            break;
        case 'placement':
            /*$config['required_by'] = */
            $config['pairs_with'] = ['impression_device'];
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

//        $campaignLevelOnly = $entity === 'Campaign' && $platform === 'adwords'
//            ? json_decode(file_get_contents(__DIR__ . '/../../maps/adwords-campaign-only.json'), TRUE)
//            : [];

        $attributes = [];
        $dimensions = [];
        $filters = [];
        $metrics = [];
        $sources = MetaData::getSources($platform, $entity);

        foreach ($sources as $source) {
            $reportAttributes = MetaData::getReport($platform, $source['report']);

            foreach ($reportAttributes as $id => $attribute) {
                $config = [
                    'id' => $id,
                    'name' => $attribute['name'],
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

            $metrics[] = $metric = $source['metric'];
            $metricConfig = MetaData::getMetric($metric);

            $cannotAggregate = $metricConfig['type'] !== 'quantity' && !isset($source['aggregate']);

            $attributes[$metric] = [
                'id' => $metric,
                'name' => isset($metricConfig['names'][$locale])
                    ? $metricConfig['names'][$locale]
                    : $attributes[$metric]['name'],
                'metric_type' => $metricConfig['type'],
                'requires_id' => $cannotAggregate,
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