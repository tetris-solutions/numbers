<?php

return function ($data): float {
    return floatval(str_replace(',', '', $data->{PROPERTY0_NAME}));
};
