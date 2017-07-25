<?php

namespace Tetris\Numbers\Generator\AdWords\Extensions;


use Tetris\Numbers\Base\Sum\TrivialSum;
use Tetris\Numbers\Generator\Extension;
use Tetris\Numbers\Generator\ExtensionApply;
use Tetris\Numbers\Generator\TransientMetric;

class AdWordsTrivialSum implements Extension
{
    use ExtensionApply;

    function patch(TransientMetric $source): TransientMetric
    {
        $trivial = (
            $source->type === 'integer' ||
            $source->type === 'decimal' ||
            $source->id === 'cost'
        );

        if ($trivial) {
            $source->sum = \Tetris\Numbers\simpleSum($source->id);
            $source->traits['sum'] = TrivialSum::class;
        }

        return $source;
    }
}
