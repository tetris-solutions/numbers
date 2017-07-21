<?php

namespace Tetris\Numbers\Base;

abstract class Source extends Field
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
