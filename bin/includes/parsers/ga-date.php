<?php

return function ($data) {
    return date('Y-m-d', strtotime($data->{PROPERTY0_NAME}));
};
