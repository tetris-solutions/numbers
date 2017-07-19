<?php

namespace Tetris\Numbers;


class AdWordsTrivialSum implements Extension
{
    use ExtensionApply;

    function patch(array $config): array
    {
        $trivial = (
            $config['type'] === 'integer' ||
            $config['type'] === 'decimal' ||
            $config['id'] === 'cost'
        );

        return $trivial
            ? ['sum' => simpleSum($config['id'])]
            : [];
    }
}
