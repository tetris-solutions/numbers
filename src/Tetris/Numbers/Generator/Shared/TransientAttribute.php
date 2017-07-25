<?php

namespace Tetris\Numbers\Generator\Shared;

use Tetris\Numbers\Base\Attribute;

class TransientAttribute extends Attribute
{
    public $description;

    use TransientField;
    use LegacyTransientField;

    function __construct()
    {
        $this->blacklist[] = 'platform';
    }
}