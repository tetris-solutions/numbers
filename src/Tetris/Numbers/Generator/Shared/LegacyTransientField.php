<?php

namespace Tetris\Numbers\Generator\Shared;


trait LegacyTransientField
{
    /**
     * @var callable|null
     */
    public $parse;
    /**
     * @var callable|null
     */
    public $sum;
}
