<?php

return function (array $rows) {
    return array_reduce(
        $rows,
        function (float $carry, $row): float {
            return $carry + $row->{PROPERTY0_NAME};
        },
        0.0
    );
};
