<?php

return function ($data) {
    return date('F', strtotime('2000-' . $data->{PROPERTY0_NAME} . '-01'));
};
