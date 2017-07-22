<?php

namespace Tetris\Numbers\Generator;


interface Extension
{
    function extend(TransientSource $config): TransientSource;
}
