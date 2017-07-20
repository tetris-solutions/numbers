<?php

namespace Tetris\Numbers;

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
