<?php

namespace Tetris\Numbers\Base;

abstract class Source
{
    /**
     * @var string
     */
    public $metric;
    /**
     * @var string
     */
    public $entity;
    /**
     * @var string
     */
    public $platform;
    /**
     * @var array
     */
    public $fields;

    /**
     * @var array|null
     */
    public $inferred_from;

    /**
     * @var string
     */
    public $report;
}
