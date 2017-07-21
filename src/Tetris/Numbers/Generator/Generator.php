<?php

namespace Tetris\Numbers\Generator;

use gossi\codegen\generator\CodeFileGenerator;
use gossi\codegen\model\PhpClass;
use gossi\codegen\model\PhpProperty;
use function Tetris\Numbers\prettyVarExport;

abstract class Generator
{
    const classRoot = __DIR__ . '/../../../../src';
    const configRoot = __DIR__ . '/../../../../src/config/dynamic';

    protected static $inventory = [];


    static function add(array $config)
    {
        self::$inventory[] = $config;
    }

    protected static function clearConfig(array $config, array $omit): array
    {
        foreach ($omit as $key) {
            unset($config[$key]);
        }

        $config['platform'] = strtolower($config['platform']);

        return $config;
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
        $dir = self::configRoot . "/$dir";

        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        file_put_contents("{$dir}/{$filename}.php", $data);
    }

    private static function writeClass(ClassWrapper $class, $data)
    {
        $dir = self::classRoot . '/' . self::unslash($class->getNamespace());

        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        file_put_contents(self::classRoot . '/' . self::unslash($class->getQualifiedName()) . '.php', $data);
    }

    private function genConfig(array $config, ClassWrapper $class, CodeFileGenerator $generator)
    {
        $configClass = new PhpClass();
        $name = uniqid('Config');
        $namespace = 'Tetris\\Numbers\\Config';

        $configClass->setName($name);
        $configClass->setNamespace($namespace);
        $configClass->addUseStatement($class->getQualifiedName());
        $configClass->setParentClassName($class->getName());

        $props = self::clearConfig($config, [
            'path',
            'traits',
            'interfaces',
            'parent',
            'raw_property'
        ]);

        foreach ($props as $key => $value) {
            if (is_scalar($value)) {
                $prop = new PhpProperty($key);
                $prop->setVisibility('public');
                $prop->setValue($value);
                $configClass->setProperty($prop);
            }

            if (is_array($value)) {
                $prop = new PhpProperty($key);
                $prop->setVisibility('public');
                $prop->setExpression(prettyVarExport($value));
                $configClass->setProperty($prop);
            }
        }

        $file = $generator->generate($configClass);
        $file = str_replace("class {$name}", "return new class", $file);
        $file = str_replace("}", "};", $file);

        self::writeConfig($config['path'], $config['id'], $file);
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

            self::genConfig($config, $myClass, $generator);
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
