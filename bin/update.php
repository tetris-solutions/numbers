#!/usr/bin/env php
<?php

$root = __DIR__ . '/..';
chdir($root);

passthru('bin/gen-adwords-report-map.php');
passthru('bin/gen-facebook-report-map.php');
passthru('vendor/bin/phinx migrate -e production');
passthru('vendor/bin/phinx seed:run');