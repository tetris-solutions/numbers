<?php
namespace Tetris\Numbers;

use Tetris\Services\FlagsService;

abstract class MetaData
{
    static $noop;
    private static $names = [];
    private static $metrics = [];
    private static $fCache = [];
    private static $sources = [
        'adwords' => [],
        'facebook' => []
    ];
    private static $reports = [
        'adwords' => [],
        'facebook' => []
    ];

    private static function requireCached(string $path)
    {
        $key = sha1($path);

        if (!isset(self::$fCache[$key])) {
            if (!file_exists($path)) {
                throw new \Exception("file path not found: {$path}", 404);
            }
            self::$fCache[$key] = require($path);
        }

        return self::$fCache[$key];
    }

    private static function readDirFiles(string $path): array
    {
        $files = scandir($path);
        $ls = [];

        foreach ($files as $file) {
            if ($file === '.' || $file === '..') continue;
            $filePath = $path . '/' . $file;
            $info = pathinfo($filePath);
            $id = $info['filename'];

            $ls[$id] = self::requireCached($filePath);
        }

        return $ls;
    }

    private static function readUserLocale(): string
    {
        if (!isset($GLOBALS['app'])) {
            return 'en';
        }

        /**
         * @var FlagsService $flags
         */
        $flags = $GLOBALS['app']->getContainer()->flags;

        return $flags->getLocale();
    }

    static function getFieldName(string $locale, string $platform, string $field): string
    {
        $path = __DIR__ . "/../locales/{$locale}/fields.php";

        if (!isset(self::$names[$locale][$platform]) && file_exists($path)) {
            self::$names[$locale] = self::requireCached($path);
        }

        if (isset(self::$names[$locale][$platform][$field])) {
            return self::$names[$locale][$platform][$field];
        }

        if (isset(self::$names[$locale][$platform][strtolower($field)])) {
            return self::$names[$locale][$platform][strtolower($field)];
        }

        return ucwords(str_replace('_', ' ', $field));
    }

    static function getSources(string $platform, string $entity): array
    {
        if (!isset(self::$sources[$platform][$entity])) {
            $path = __DIR__ . "/../../config/{$platform}/sources/" . strtolower($entity);

            self::$sources[$platform][$entity] = self::readDirFiles($path);
        }

        return self::$sources[$platform][$entity];
    }

    static function getMetricSource(string $platform, string $entity, string $metric): array
    {
        return self::requireCached(
            __DIR__ . "/../../config/{$platform}/sources/" . strtolower($entity) . "/{$metric}.php"
        );
    }

    private static function getArtificialDimensions()
    {
        return self::requireCached(
            __DIR__ . "/../../src/artificial/dimensions.php"
        );
    }

    static function getReport(string $platform, string $reportName): array
    {
        if (!isset(self::$reports[$platform][$reportName])) {
            $path = __DIR__ . "/../../config/{$platform}/reports/{$reportName}";

            $attributes = array_merge(
                self::readDirFiles($path),
                self::getArtificialDimensions()
            );

            foreach ($attributes as $id => $attribute) {
                $names = isset($attribute['names'])
                    ? $attribute['names']
                    : [
                        'en' => self::getFieldName('en', $platform, $attribute['property']),
                        'pt-BR' => self::getFieldName('pt-BR', $platform, $attribute['property'])
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
            $path = __DIR__ . "/../../config/metrics/{$id}.php";

            self::$metrics[$id] = self::requireCached($path);
        }

        return self::$metrics[$id];
    }

    private static function setBreakdownPermutation(&$config)
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
                    'is_percentage' => isset($attribute['is_percentage']) ? $attribute['is_percentage'] : false,
                    'is_dimension' => $attribute['is_dimension']
                ];

                if ($platform === 'facebook' && in_array($id, FacebookResolver::$breakdowns)) {
                    $config['is_breakdown'] = true;
                    self::setBreakdownPermutation($config);
                }

                $attributes[$id] = $config;
            }

            $metric = $source['metric'];
            $metricConfig = MetaData::getMetric($metric);

            $cannotAggregate = !isset($source['sum']);

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

    private static function getReplaceMap()
    {
        return self::requireCached(__DIR__ . '/../artificial/attribute-merges.php');
    }

    static function getAttributeMerge(string $attribute, string $platform): array
    {
        $map = self::getReplaceMap();

        $identity = function ($val) {
            return $val;
        };

        if (isset($map[$platform][$attribute])) {
            $config = $map[$platform][$attribute];

            return [
                'id' => is_array($config) ? $config[0] : $config,
                'transform' => is_array($config) ? $config[1] : $identity
            ];
        } else {
            return [
                'id' => $attribute,
                'transform' => $identity
            ];
        }
    }

    static function getPlatformSpecificAttribute(string $attribute, string $platform): array
    {
        $identity = function ($val) {
            return $val;
        };

        $found = [
            'id' => $attribute,
            'transform' => $identity
        ];

        $map = self::getReplaceMap();

        foreach ($map[$platform] as $original => $replacement) {
            $id = is_array($replacement) ? $replacement[0] : $replacement;

            if ($id === $attribute) {
                $found = [
                    'id' => $original,
                    'transform' => is_array($replacement) ? $replacement[1] : $identity
                ];
                break;
            }
        }

        return $found;
    }
}