<?php

namespace Tetris\Numbers\Generator\Shared;

interface Extension
{
    function extend(TransientMetric $config): TransientMetric;
}
