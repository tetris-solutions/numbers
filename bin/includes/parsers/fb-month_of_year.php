<?php

return function ($data) {
    return date('F', strtotime($data->{PROPERTY0_NAME}));
};
