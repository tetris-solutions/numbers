<?php

return function ($data) {
    return date('Y-m', strtotime($data->{PROPERTY0_NAME})) . '-01';
};
