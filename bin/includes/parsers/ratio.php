<?php

return function ($data) {
    $conv = floatval(str_replace(',', '', $data->{PROPERTY0_NAME}));
    $cost = floatval(str_replace(',', '', $data->{PROPERTY1_NAME}));

    return $cost === 0.0 ? 0.0 : $conv / $cost;
};
