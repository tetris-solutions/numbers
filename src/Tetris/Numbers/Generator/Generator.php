<?php

namespace Tetris\Numbers\Generator;

use gossi\codegen\generator\CodeFileGenerator;

abstract class Generator
{
    protected static $inventory = [];

    protected static function add(array $config)
    {
        self::$inventory[] = $config;
    }

    static function dump()
    {
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
            $relative = str_replace("\\", "/", $class->getNamespace());
            $dir = __DIR__ . "/../../../../src/{$relative}";

            if (!file_exists($dir)) {
                mkdir($dir, 0755, true);
            }

            $dir = realpath($dir);
            $file = "{$dir}/{$class->getName()}.php";

            file_put_contents(
                $file,
                $generator->generate($class)
            );
        }
    }
}
