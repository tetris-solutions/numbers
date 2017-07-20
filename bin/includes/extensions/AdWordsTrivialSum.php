<?php

namespace Tetris\Numbers;


use tetris\Numbers\Base\Sum\TrivialSum;

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
            ? [
                'sum' => simpleSum($config['id']),
                'traits' => [
                    TrivialSum::class
                ]]
            : [];
    }
}
