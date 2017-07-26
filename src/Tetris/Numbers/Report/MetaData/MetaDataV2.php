<?php

namespace Tetris\Numbers\Report\MetaData;


use Tetris\Numbers\Base\Attribute;
use Tetris\Numbers\Base\Metric;
use Tetris\Numbers\Base\Summable;
use Tetris\Numbers\Resolver\FacebookResolver;

class MetaDataV2 implements MetaDataReader
{
    use Meta;

    const configDir = __DIR__ . '/../../../../config/dynamic';

    static function listAttributes(string $platform, string $entity): array
    {
        $attributes = [];

        $sources = self::getSources($platform, $entity);

        /**
         * @var Metric $source
         */
        foreach ($sources as $source) {
            $reportAttributes = self::getReport($platform, $source->report);

            /**
             * @var Attribute $attribute
             */
            foreach ($reportAttributes as $attribute) {
                if (
                    !$attribute->is_metric &&
                    $platform === 'facebook' &&
                    FacebookResolver::isBreakdown($attribute->id)
                ) {
                    $attribute->is_breakdown = true;
                    self::setBreakdownPermutation($attribute);
                }

                $attributes[$attribute->id] = $attribute;
            }

            /**
             * @var Attribute $attrMetaData
             */
            $attrMetaData = $attributes[$source->id];

            $attrMetaData->requires_id = (
                $platform !== 'analytics' &&
                !($source instanceof Summable)
            );

            $attributes[$source->id] = $attrMetaData;
        }

        return $attributes;
    }

    static function getSources(string $platform, string $entity): array
    {
        $capitalizedPlatform = self::capitalized($platform);

        return self::readDirFiles(realpath(self::configDir . "/{$capitalizedPlatform}/Metrics/{$entity}"));
    }

    static function getReport(string $platform, string $reportName): array
    {
        $capitalizedPlatform = self::capitalized($platform);

        $attributesDir = realpath(self::configDir . "/{$capitalizedPlatform}/Attributes/{$reportName}");

        $attributes = self::readDirFiles($attributesDir);

        /**
         * @var Attribute $attribute
         */
        foreach ($attributes as $id => $attribute) {
            $propName = $attribute->property_name ?? $attribute->property;

            $names = $attribute->names ?? [
                    'en' => self::getFieldName('en', $platform, $propName),
                    'pt-BR' => self::getFieldName('pt-BR', $platform, $propName)
                ];
            $attributes[$id]['name'] = $names[self::readUserLocale()];
        }

        return $attributes;
    }

    static function getMetricSource(string $platform, string $entity, string $metric): Metric
    {
        $platform = self::capitalized($platform);
        return self::requireCached(
            realpath(self::configDir . "/{$platform}/Metrics/{$entity}/{$metric}.php")
        );
    }
}