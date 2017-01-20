<?php

return function ($data) {
    $spend = floatval(str_replace(',', '', $data->{PROPERTY0_NAME}));

    $collection = PROPERTY1_NAME;
    $type = PROPERTY2_NAME;

    $actionValue = null;

    if (empty($data->{$collection})) return NULL;

    foreach ($data->{$collection} as $action) {
        if ($action['action_type'] === $type) {
            $actionValue = (float)str_replace(',', '', $action['value']);
            break;
        }
    }

    return !$actionValue ? 0 : $spend / $actionValue;
};
