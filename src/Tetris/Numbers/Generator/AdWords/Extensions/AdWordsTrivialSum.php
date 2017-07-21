<?php

namespace Tetris\Numbers\Generator\AdWords\Extensions;


use Tetris\Numbers\Base\Sum\TrivialSum;
use Tetris\Numbers\Generator\Extension;
use Tetris\Numbers\Generator\ExtensionApply;

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
                'sum' => \Tetris\Numbers\simpleSum($config['id']),
                'traits' => [
                    'sum' => TrivialSum::class
                ]]
            : [];
    }
}
