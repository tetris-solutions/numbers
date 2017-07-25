<?php

namespace Tetris\Numbers\Generator\Shared;

use Tetris\Numbers\Base\Field;

interface Extension
{
    function patch(Field $source): array;

    /**
     * @param TransientMetric|TransientAttribute $config
     * @return TransientMetric|TransientAttribute
     */
    function extend($config);
}
