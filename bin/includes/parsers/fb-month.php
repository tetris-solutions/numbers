<?php

return function ($data) {
    return isset($data->{PROPERTY0_NAME})
      ? date('Y-m', strtotime($data->{PROPERTY0_NAME})) . '-01'
      : null;
};
