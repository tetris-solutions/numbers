<?php

namespace Tetris\Numbers\Generator\Shared;

use gossi\codegen\model\PhpClass;
use Tetris\Numbers\Base\Parsable;
use Tetris\Numbers\Base\Summable;

class ClassWrapper extends PhpClass
{
    public $parentClass;

    private function bareClassName(string $a): string
    {
        $parts = explode('\\', $a);
        return array_pop($parts);
    }

    /**
     * ClassWrapper constructor.
     * @param TransientMetric|TransientAttribute $config
     */
    function __construct($config)
    {
        parent::__construct(null);

        $traits = $config->traits;
        $interfaces = [];

        if (isset($traits['parser'])) {
            $interfaces[] = Parsable::class;
        }

        if (isset($traits['sum'])) {
            $interfaces[] = Summable::class;
        }

        $traits = array_values($traits);

        sort($traits);

        $this->parentClass = $config->parent;

        $parentName = $this->bareClassName($config->parent);

        $name = implode("_",
            array_merge(
                [$parentName],
                array_map([$this, 'bareClassName'], $traits),
                array_map([$this, 'bareClassName'], $interfaces)
            )
        );

        $namespace = "Tetris\\Numbers\\Generated\\Shared\\$parentName";

        $this->setName($name);
        $this->setNamespace($namespace);

        $this->setUseStatements(array_merge(
            [
                $config->parent
            ],
            $interfaces,
            $traits
        ));

        $this->setInterfaces(array_map(
            [$this, 'bareClassName'],
            $interfaces
        ));

        $this->setTraits(array_map(
            [$this, 'bareClassName'],
            $traits
        ));

        $this->setParentClassName($parentName);
    }
}