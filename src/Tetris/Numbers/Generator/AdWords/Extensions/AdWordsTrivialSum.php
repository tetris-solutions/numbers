<?php

namespace Tetris\Numbers\Generator\AdWords\Extensions;

use Tetris\Numbers\Base\Field;
use Tetris\Numbers\Base\Sum\TrivialSum;
use Tetris\Numbers\Generator\Shared\Extension;
use Tetris\Numbers\Generator\Shared\ExtensionApply;
use function Tetris\Numbers\simpleSum;

class AdWordsTrivialSum implements Extension
{
    use ExtensionApply;

    function patch(Field $source): array
    {
        $patch = [
            'traits' => []
        ];

        $trivial = (
            $source->type === 'integer' ||
            $source->type === 'decimal' ||
            $source->id === 'cost'
        );

        if ($trivial) {
            $patch['sum'] = simpleSum($source->id);
            $patch['traits']['sum'] = TrivialSum::class;
        }

        return $patch;
    }
}
