<?php

namespace Tetris\Numbers\Generator\Analytics\Extensions;

use Tetris\Numbers\Base\Field;
use Tetris\Numbers\Base\Sum\TrivialSum;
use Tetris\Numbers\Generator\Shared\Extension;
use Tetris\Numbers\Generator\Shared\ExtensionApply;
use function Tetris\Numbers\simpleSum;

class AnalyticsTrivialSum implements Extension
{
    use ExtensionApply;

    function patch(Field $source): array
    {
        $patch = [
            'traits' => []
        ];

        if ($source->type === 'integer') {
            $patch['sum'] = simpleSum($source->id);
            $patch['traits']['sum'] = TrivialSum::class;
        }

        return $patch;
    }
}
