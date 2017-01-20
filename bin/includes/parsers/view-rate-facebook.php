<?php

return function ($data) {
    $collection = PROPERTY0_NAME;
    $type = PROPERTY1_NAME;

    $impressions = floatval(str_replace(',', '', $data->{PROPERTY2_NAME}));

    $actionValue = null;

    if (empty($data->{$collection})) return NULL;

    foreach ($data->{$collection} as $action) {
        if ($action['action_type'] === $type) {
            $actionValue = (float)str_replace(',', '', $action['value']);
            break;
        }
    }

    return !$impressions ? 0 : $actionValue / $impressions;
};
