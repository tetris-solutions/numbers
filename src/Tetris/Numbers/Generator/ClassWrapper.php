<?php

namespace Tetris\Numbers\Generator;

use gossi\codegen\model\PhpClass;
use Tetris\Numbers\Base\Parsable;
use Tetris\Numbers\Base\Summable;

class ClassWrapper extends PhpClass
{
    private function qualified(string $a): string
    {
        $parts = explode('\\', $a);
        return array_pop($parts);
    }

    function __construct(array $config)
    {
        parent::__construct(null);

        $traits = $config['traits'];
        $interfaces = [];

        if (isset($traits['parser'])) {
            $interfaces[] = Parsable::class;
        }

        if (isset($traits['sum'])) {
            $interfaces[] = Summable::class;
        }

        $traits = array_values($traits);

        sort($traits);

        $parentName = $this->qualified($config['parent']);
        $platform = ucfirst($config['platform']);

        $name = implode("_",
            array_merge(
                [$parentName],
                array_map([$this, 'qualified'], $traits),
                array_map([$this, 'qualified'], $interfaces)
            )
        );

        $namespace = "Tetris\\Numbers\\Generated\\$platform\\$parentName";

        $this->setName($name);
        $this->setNamespace($namespace);

        $this->setUseStatements(array_merge(
            [
                $config['parent']
            ],
            $interfaces,
            $traits
        ));

        $this->setInterfaces(array_map(
            [$this, 'qualified'],
            $interfaces
        ));

        $this->setTraits(array_map(
            [$this, 'qualified'],
            $traits
        ));

        $this->setParentClassName($parentName);
    }
}