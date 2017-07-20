<?php

namespace Tetris\Numbers\Generator;

use gossi\codegen\model\PhpClass;

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

        sort($config['interfaces']);
        sort($config['traits']);

        $parentName = $this->qualified($config['parent']);
        $platform = ucfirst($config['platform']);

        $name = implode("",
            array_merge(
                [$platform, $parentName],
                array_map([$this, 'qualified'], $config['traits']),
                array_map([$this, 'qualified'], $config['interfaces'])
            )
        );

        $namespace = "Tetris\\Numbers\\Generated\\$platform\\$parentName";

        $this->setName($name);
        $this->setNamespace($namespace);

        $this->setUseStatements(array_merge(
            [
                $config['parent']
            ],
            $config['interfaces'],
            $config['traits']
        ));

        $this->setInterfaces(array_map(
            [$this, 'qualified'],
            $config['interfaces']
        ));

        $this->setTraits(array_map(
            [$this, 'qualified'],
            $config['traits']
        ));

        $this->setParentClassName($parentName);
    }
}