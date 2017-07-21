<?php

namespace Tetris\Numbers;


use Tetris\Numbers\Base\Attribute;
use Tetris\Numbers\Base\AttributeMetaData;
use Tetris\Numbers\Base\Source;
use Tetris\Numbers\Base\Summable;
use Tetris\Numbers\Resolver\FacebookResolver;
use Tetris\Numbers\Utils\ObjectUtils;

class MetaDataV2 implements MetaDataReader
{
    use Meta;

    const config = __DIR__ . '/../../config/dynamic';

    static function listAttributes(string $platform, string $entity): array
    {
        $attributes = [];

        $sources = self::getSources($platform, $entity);

        /**
         * @var Source $source
         */
        foreach ($sources as $source) {
            $reportAttributes = self::getReport($platform, $source->report);

            /**
             * @var Attribute $attribute
             */
            foreach ($reportAttributes as $attribute) {
                /**
                 * @var AttributeMetaData $metaData
                 */
                $metaData = ObjectUtils::cast(
                    AttributeMetaData::class,
                    $attribute
                );

                if (
                    !$attribute->is_metric &&
                    $platform === 'facebook' &&
                    FacebookResolver::isBreakdown($attribute->id)
                ) {
                    $metaData->is_breakdown = true;
                }

                $attributes[$attribute->id] = $metaData;
            }

            /**
             * @var AttributeMetaData $attrMetaData
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

        return self::readDirFiles(realpath(self::config . "/{$capitalizedPlatform}/Sources/{$entity}"));
    }

    static function getReport(string $platform, string $reportName): array
    {
        $capitalizedPlatform = self::capitalized($platform);

        $attributes = array_merge(
            self::readDirFiles(realpath(self::config . "/{$capitalizedPlatform}/Attributes/{$reportName}"))/*,
            self::getArtificialDimensions()*/
        );

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
}