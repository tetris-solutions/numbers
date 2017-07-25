<?php

namespace Tetris\Numbers\Generator;


interface Extension
{
    function extend(TransientMetric $config): TransientMetric;
}
