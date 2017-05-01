<?php

return function ($data) {
    return date('l', strtotime($data->{PROPERTY0_NAME}));
};
