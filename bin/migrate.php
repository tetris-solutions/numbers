#!/usr/bin/env php
<?php

$root = __DIR__ . '/..';
chdir($root);

passthru('vendor/bin/phinx migrate -e production');
passthru('vendor/bin/phinx seed:run');