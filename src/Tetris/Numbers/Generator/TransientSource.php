<?php

namespace Tetris\Numbers\Generator;

use Tetris\Numbers\Base\Source;

class TransientSource extends Source
{
    use Transient;
    use LegacyTransient;
}