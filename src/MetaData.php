<?php
namespace Tetris\Numbers;

use Tetris\Services\FlagsService;

abstract class MetaData
{
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
        $path = __DIR__ . "/locales/{$locale}/fields.php";

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
            $path = __DIR__ . "/config/{$platform}/sources/" . strtolower($entity);

            self::$sources[$platform][$entity] = self::readDirFiles($path);
        }

        return self::$sources[$platform][$entity];
    }

    static function getMetricSource(string $platform, string $entity, string $metric): array
    {
        return self::requireCached(
            __DIR__ . "/config/{$platform}/sources/" . strtolower($entity) . "/{$metric}.php"
        );
    }

    static function getReport(string $platform, string $reportName): array
    {
        if (!isset(self::$reports[$platform][$reportName])) {
            $path = __DIR__ . "/config/{$platform}/reports/{$reportName}";

            $attributes = self::readDirFiles($path);

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
            $path = __DIR__ . "/config/metrics/{$id}.php";

            self::$metrics[$id] = self::requireCached($path);
        }

        return self::$metrics[$id];
    }
}