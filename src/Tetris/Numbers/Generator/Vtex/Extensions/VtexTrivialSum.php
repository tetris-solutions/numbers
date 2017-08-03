<?php

namespace Tetris\Numbers\Generator\Vtex\Extensions;

use Tetris\Numbers\Base\Field;
use Tetris\Numbers\Base\Sum\TrivialSum;
use Tetris\Numbers\Generator\Shared\Extension;
use Tetris\Numbers\Generator\Shared\ExtensionApply;

class VtexTrivialSum implements Extension
{
    use ExtensionApply;

    function patch(Field $source): array
    {
        $patch = [
            'traits' => []
        ];

        if ($source->type === 'integer') {
            $patch['traits']['sum'] = TrivialSum::class;
        }

        return $patch;
    }
}
