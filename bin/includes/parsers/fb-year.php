<?php

return function ($data) {
    return date('Y', strtotime($data->{PROPERTY0_NAME}));
};
