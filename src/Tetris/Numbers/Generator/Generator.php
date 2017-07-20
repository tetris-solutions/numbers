<?php

namespace Tetris\Numbers\Generator;

use gossi\codegen\generator\CodeFileGenerator;
use gossi\codegen\generator\CodeGenerator;
use gossi\codegen\model\PhpFunction;
use gossi\codegen\model\PhpParameter;
use function Tetris\Numbers\prettyVarExport;

abstract class Generator
{
    const classRoot = __DIR__ . '/../../../../src';
    const configRoot = __DIR__ . '/../../../../src/config/dynamic';

    protected static $inventory = [];


    protected static function add(array $config)
    {
        self::$inventory[] = $config;
    }

    protected static function clearConfig(array $config): array
    {
        unset($config['id']);
        unset($config['property']);
        unset($config['path']);
        unset($config['type']);
        unset($config['traits']);
        unset($config['interfaces']);
        unset($config['parent']);

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

    private function genConfig(array $config, ClassWrapper $class)
    {
        $name = str_replace('/', '', $config['path']) . uniqid();

        $file = "<?php\n";
        $file .= "namespace Tetris\\Numbers\\Config;\n\n";
        $file .= "use {$class->getQualifiedName()};\n\n";

        $file .= "return new class extends {$class->getName()} {\n";

        foreach (self::clearConfig($config) as $key => $value) {
            if (is_scalar($value) || is_array($value)) {
                $file .= "\tpublic \${$key} = " . json_encode($value) . ";\n";
            }
        }


        $file .= "};\n";

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

            self::genConfig($config, $myClass);
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
