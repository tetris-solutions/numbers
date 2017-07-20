<?php

namespace tetris\Numbers\Base\Sum;

use Tetris\Numbers\Base\Field;

trait TrivialSum
{
    use Field;

    function sum(array $rows)
    {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{$this->id};
            },
            0.0
        );
    }
}
