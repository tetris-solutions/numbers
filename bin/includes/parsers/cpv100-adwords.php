<?php

return function ($data) {
    $cost = floatval(str_replace(',', '', $data->{PROPERTY0_NAME}));
    $fullViewPercent = str_replace(['%', ','], '', $data->{PROPERTY1_NAME});
    $fullViewPercent = floatval($fullViewPercent) / 100;

    $allViews = intval(str_replace(',', '', $data->{PROPERTY2_NAME}));

    $fullViews = $allViews * $fullViewPercent;

    return $fullViews === 0.0 ? 0.0 : $cost / $fullViews;
};
