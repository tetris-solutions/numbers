<?php

return function ($data) {
    $collection = PROPERTY0_NAME;
    $type = PROPERTY1_NAME;

    if (empty($data->{$collection})) return NULL;

    foreach ($data->{$collection} as $action) {
        if ($action['action_type'] === $type) {
            return (float)str_replace(',', '', $action['value']);
        }
    }

    return NULL;
};
