<?php

return function ($data) {
    $time = strtotime($data->{PROPERTY0_NAME});
    $weekDay = date('N', $time) - 1;

    $firstMomentOfWeek = $time - (24 * 60 * 60 * $weekDay);

    return date('Y-m-d', $firstMomentOfWeek);
};
