<?php

namespace Tetris\Numbers\Generator;

use gossi\codegen\generator\CodeFileGenerator;

abstract class Generator
{
    const classRoot = __DIR__ . '/../../../../src';
    const configRoot = __DIR__ . '/../../../../src/config/dynamic';

    protected static $inventory = [];


    protected static function add(array $config)
    {
        self::$inventory[] = $config;
    }

    private static function rrmdir($src)
    {
        if (!file_exists($src)) return;

        $dir = opendir($src);
        while (false !== ($file = readdir($dir))) {
            if (($file != '.') && ($file != '..')) {
                $full = $src . '/' . $file;
                if (is_dir($full)) {
                    self::rrmdir($full);
                } else {
                    unlink($full);
                }
            }
        }
        closedir($dir);
        rmdir($src);
    }

    private static function clear()
    {
        self::rrmdir(self::classRoot . '/Tetris/Numbers/Generated');
        self::rrmdir(self::configRoot);
    }

    private static function unslash(string $str)
    {
        return str_replace("\\", "/", $str);
    }

    private static function writeConfig(string $dir, $filename, $data)
    {
        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        file_put_contents(self::configRoot . "/{$dir}/{$filename}.php", $data);
    }

    private static function writeClass(ClassWrapper $class, $data)
    {
        $dir = self::classRoot . '/' . self::unslash($class->getNamespace());

        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        file_put_contents(self::classRoot . '/' . self::unslash($class->getQualifiedName()) . '.php', $data);
    }

    static function dump()
    {
        self::clear();
        $classes = [];

        $generator = new CodeFileGenerator([
            'generateEmptyDocblock' => false,
            'generateScalarTypeHints' => true,
            'generateReturnTypeHints' => true
        ]);

        foreach (self::$inventory as $index => $config) {
            $myClass = new ClassWrapper($config);
            $found = null;
            /**
             * @var ClassWrapper $class
             */
            foreach ($classes as $class) {
                if ($class->getName() === $myClass->getName()) {
                    $found = $class;
                    $myClass = $class;
                    break;
                }
            }

            if (!$found) {
                $classes[] = $myClass;
            }

            $config['class'] = $myClass;

            self::$inventory[$index] = $config;
        }

        /**
         * @var ClassWrapper $class
         */
        foreach ($classes as $class) {
            self::writeClass($class, $generator->generate($class));
        }
    }
}
