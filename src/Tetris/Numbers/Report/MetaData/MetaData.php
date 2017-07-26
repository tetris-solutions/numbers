<?php

namespace Tetris\Numbers\Report\MetaData;



use Tetris\Numbers\Resolver\FacebookResolver;

abstract class MetaData implements MetaDataReader
{
    use Meta;
    const configDir = __DIR__ . '/../../../../../config';

    private static $metrics = [];

    private static $sources = [
        'adwords' => [],
        'facebook' => [],
        'analytics' => []
    ];

    private static $reports = [
        'adwords' => [],
        'facebook' => [],
        'analytics' => []
    ];

    static function getSources(string $platform, string $entity): array
    {
        if (!isset(self::$sources[$platform][$entity])) {
            $path = realpath(self::configDir . "/{$platform}/sources/" . strtolower($entity));

            self::$sources[$platform][$entity] = self::readDirFiles($path);
        }

        return self::$sources[$platform][$entity];
    }

    static function getMetricSource(string $platform, string $entity, string $metric): array
    {
        return self::requireCached(
            realpath(self::configDir . "/{$platform}/sources/" . strtolower($entity) . "/{$metric}.php")
        );
    }

    static function getReport(string $platform, string $reportName): array
    {
        if (!isset(self::$reports[$platform][$reportName])) {
            $path = realpath(self::configDir . "/{$platform}/reports/{$reportName}");

            $attributes = array_merge(
                self::readDirFiles($path),
                self::getArtificialDimensions()
            );

            foreach ($attributes as $id => $attribute) {
                $propName = $attribute['property_name'] ?? $attribute['property'];

                $names = $attribute['names'] ?? [
                        'en' => self::getFieldName('en', $platform, $propName),
                        'pt-BR' => self::getFieldName('pt-BR', $platform, $propName)
                    ];
                $attributes[$id]['name'] = $names[self::readUserLocale()];
            }

            self::$reports[$platform][$reportName] = $attributes;
        }

        return self::$reports[$platform][$reportName];
    }

    static function getMetric(string $id): array
    {
        if (!isset(self::$metrics[$id])) {
            $path = realpath(self::configDir . "/metrics/{$id}.php");

            self::$metrics[$id] = self::requireCached($path);
        }

        return self::$metrics[$id];
    }

    static function listAttributes(string $platform, string $entity): array
    {
        $attributes = [];
        $sources = MetaData::getSources($platform, $entity);

        foreach ($sources as $source) {
            $reportAttributes = MetaData::getReport($platform, $source['report']);

            foreach ($reportAttributes as $id => $attribute) {
                if (isset($attributes[$id])) continue;

                $config = [
                    'id' => $id,
                    'name' => $attribute['name'],
                    'is_metric' => $attribute['is_metric'],
                    'type' => $attribute['type'],
                    'is_percentage' => $attribute['is_percentage'] ?? false,
                    'is_dimension' => $attribute['is_dimension']
                ];

                if (isset($attribute['values'])) {
                    $config['values'] = $attribute['values'];
                }

                if (isset($attribute['incompatible'])) {
                    $config['incompatible'] = $attribute['incompatible'];
                }

                if ($platform === 'facebook' && FacebookResolver::isBreakdown($id)) {
                    $config['is_breakdown'] = true;
                    self::setBreakdownPermutation($config);
                }

                $attributes[$id] = $config;
            }

            $metric = $source['metric'];
            $metricConfig = MetaData::getMetric($metric);

            $cannotAggregate = $platform !== 'analytics' && !isset($source['sum']);

            $attributes[$metric] = array_merge($attributes[$metric], [
                'type' => $metricConfig['type'],
                'requires_id' => $cannotAggregate,
                'is_metric' => true,
                'is_dimension' => false,
                'is_breakdown' => false
            ]);
        }

        return $attributes;
    }
}
