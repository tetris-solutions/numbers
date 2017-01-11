<?php

return function ($data): int {
    return (int)str_replace(',', '', $data->{PROPERTY0_NAME});
};
