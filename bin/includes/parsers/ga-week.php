<?php

return function ($data) {
    $date = new DateTime();
    $isoWeek = $data->{PROPERTY0_NAME};

    $year = (int)substr($isoWeek, 0, 4);
    $week = (int)substr($isoWeek, 4);

    $date->setISODate($year, $week);

    return $date->format('Y-m-d');
};
