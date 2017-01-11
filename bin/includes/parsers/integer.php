<?php

return function ($data): int {
    return intval(str_replace(',', '', $data->{PROPERTY0_NAME}));
};
