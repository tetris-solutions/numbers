#!/usr/bin/env php
<?php

$root = __DIR__ . '/..';
chdir($root);


passthru('bin/gen-adwords-report-map.php > maps/adwords.json');
passthru('bin/gen-facebook-report-map.php > maps/facebook.json');
passthru('vendor/bin/phinx migrate -e production');
passthru('vendor/bin/phinx seed:run');