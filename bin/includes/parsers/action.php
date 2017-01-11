<?php

return function ($data) {
    if (empty($data->actions)) return NULL;

    foreach ($data->actions as $action) {
        if ($action['action_type'] === PROPERTY0_NAME) {
            return (float)str_replace(',', '', $action['value']);
        }
    }
    return NULL;
};
