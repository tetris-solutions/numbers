<?php

namespace Tetris\Numbers\Report\MetaData;


use Tetris\Numbers\Base\Attribute;
use Tetris\Services\FlagsService;

trait Meta
{
    protected static $names = [];

    protected static $cache = [];

    protected static function capitalized(string $platform)
    {
        switch ($platform) {
            case 'adwords':
                return 'AdWords';
            case 'facebook':
                return 'Facebook';
            case 'analytics':
                return 'Analytics';
            default:
                throw new \Exception("Platform {$platform} not supported");
        }
    }

    static function getFieldName(string $locale, string $platform, string $field): string
    {
        $path = realpath(__DIR__ . "/../../../../locales/{$locale}/fields.php");

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

    protected static function requireCached(string $path)
    {
        $key = sha1($path);

        if (!isset(self::$cache[$key])) {
            if (!file_exists($path)) {
                throw new \Exception("file path not found: {$path}", 404);
            }
            self::$cache[$key] = require($path);
        }

        return self::$cache[$key];
    }

    protected static function readDirFiles(string $path): array
    {
        $files = file_exists($path) ? scandir($path) : [];
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

    protected static function readUserLocale(): string
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

    protected static function getReplaceMap()
    {
        return self::requireCached(realpath(__DIR__ . '/../../../../config/attribute-merges.php'));
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

    protected static function getArtificialDimensions()
    {
        return self::requireCached(
            realpath(__DIR__ . "/../../../../config/dimensions.php")
        );
    }

    /**
     * @param array|Attribute $config
     */
    protected static function setBreakdownPermutation(&$config)
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
}