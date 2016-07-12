<?php
namespace Tetris\Numbers;

use Tetris\MonoStash\MonoStash;

$logger = new MonoStash(PHP_SAPI === 'cli' ? 'numbers-routine' : 'numbers-api');

return $logger;

