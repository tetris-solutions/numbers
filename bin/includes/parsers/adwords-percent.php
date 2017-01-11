<?php

return function ($data): float {
    $valueAsNumericString = str_replace(['%', ','], '', $data->{PROPERTY0_NAME});

    return floatval($valueAsNumericString) / 100;
};