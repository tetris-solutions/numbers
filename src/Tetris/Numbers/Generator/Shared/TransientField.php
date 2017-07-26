<?php

namespace Tetris\Numbers\Generator\Shared;


trait TransientField
{
    /**
     * @var string|null
     */
    public $description;
    /**
     * @var string
     */
    public $platform;
    /**
     * @var string
     */
    public $raw_property;

    /**
     * @var string
     */
    public $parent;
    /**
     * @var string
     */
    public $path;
    /**
     * @var array
     */
    public $traits = [];
}
