<?php

namespace Tetris\Numbers\Report;

use Tetris\Numbers\Report\MetaData\MetaDataV2;

class ReportV2 extends ReportBlueprint
{
    function __construct(string $platform, string $name)
    {
        parent::__construct($platform, $name);
        $this->attributes = MetaDataV2::getReport($platform, $name);
    }
}