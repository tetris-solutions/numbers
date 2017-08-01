<?php

namespace Tetris\Numbers\Generator;

use gossi\codegen\generator\CodeFileGenerator;
use gossi\codegen\model\PhpClass;
use gossi\codegen\model\PhpProperty;
use Tetris\Numbers\Generator\Shared\ClassWrapper;
use Tetris\Numbers\Generator\Shared\TransientField;
use Tetris\Numbers\Generator\Shared\TransientAttribute;
use Tetris\Numbers\Generator\Shared\TransientMetric;
use function Tetris\Numbers\prettyVarExport;

abstract class Generator
{
    const classRoot = __DIR__ . '/../../../../src';
    const configRoot = __DIR__ . '/../../../../config';

    private static $inventory = [];

    private static function rmdir($src)
    {
        if (!file_exists($src)) return;

        $dir = opendir($src);
        while (false !== ($file = readdir($dir))) {
            if (($file != '.') && ($file != '..')) {
                $full = $src . '/' . $file;
                if (is_dir($full)) {
                    self::rmdir($full);
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
        self::rmdir(self::classRoot . '/Tetris/Numbers/Generated');
        self::rmdir(self::configRoot);
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

    /**
     * @param TransientMetric|TransientAttribute $config
     * @param ClassWrapper $class
     * @param CodeFileGenerator $generator
     */
    private static function genConfig($config, ClassWrapper $class, CodeFileGenerator $generator)
    {
        $configClass = new PhpClass();
        $name = uniqid('Config');
        $namespace = 'Tetris\\Numbers\\Config';

        $configClass->setName($name);
        $configClass->setNamespace($namespace);
        $configClass->addUseStatement($class->getQualifiedName());
        $configClass->setParentClassName($class->getName());

        foreach (get_object_vars($config) as $key => $value) {
            $isTransientProp = property_exists(TransientField::class, $key);
            $isFinalProperty = property_exists($config->parent, $key);

            if ($isTransientProp && !$isFinalProperty) {
                continue;
            }

            if ($key === 'platform') {
                $value = strtolower($value);
            }

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

        /**
         * @var TransientMetric|TransientAttribute $config
         */
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

    /**
     * @param TransientMetric|TransientAttribute $config
     */
    static function add($config)
    {
        self::$inventory[] = $config;
    }
}
