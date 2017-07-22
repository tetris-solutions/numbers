<?php

namespace Tetris\Numbers\Generator;

use Tetris\Numbers\Base\Attribute;

class TransientAttribute extends Attribute
{
    use Transient;
    use LegacyTransient;

    function __construct()
    {
        $this->blacklist[] = 'platform';
    }
}