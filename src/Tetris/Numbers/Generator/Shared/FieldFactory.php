<?php

namespace Tetris\Numbers\Generator\Shared;


abstract class FieldFactory
{
    /**
     * @var string
     */
    protected $platform;
    /**
     * @var string
     */
    protected static $parentClass;
    /**
     * @var LegacyTypeParser
     */
    protected $legacyParser;

    function __construct()
    {
        $this->legacyParser = new LegacyTypeParser();
    }
}
