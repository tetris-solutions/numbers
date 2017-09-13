<?php

namespace Tetris\Manager;

use Predis\Client;
use Predis\Command\StringSet;
use Predis\Command\StringGet;

class StringSetJson extends StringSet
{

    protected function filterArguments(Array $arguments)
    {
        $arguments[1] = json_encode($arguments[1]);
        return $arguments;
    }
}

class StringGetJson extends StringGet
{

    public function parseResponse($data)
    {
        return json_decode($data, TRUE);
    }
}

$GLOBALS['predis'] = $predis = new Client(getenv('REDIS_URI'));

$predis->getProfile()->defineCommand('jsonset', StringSetJson::class);
$predis->getProfile()->defineCommand('jsonget', StringGetJson::class);
