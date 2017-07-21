<?php

namespace Tetris\Numbers\Report;

use Tetris\Numbers\Report\MetaData\MetaData;

class Report extends ReportBlueprint
{
    function __construct(string $platform, string $name)
    {
        parent::__construct($platform, $name);
        $this->attributes = MetaData::getReport($platform, $name);
    }
}