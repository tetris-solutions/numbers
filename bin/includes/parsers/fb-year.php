<?php

return function ($data) {
  return isset($data->{PROPERTY0_NAME})
    ? date('Y', strtotime($data->{PROPERTY0_NAME}))
    : null;
};
