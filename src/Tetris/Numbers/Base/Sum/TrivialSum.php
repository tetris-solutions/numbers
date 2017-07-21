<?php

namespace Tetris\Numbers\Base\Sum;

trait TrivialSum
{
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
