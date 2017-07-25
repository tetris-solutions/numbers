<?php

namespace Tetris\Numbers\Base;


trait FieldMetaData
{

    /**
     * @var string|null
     */
    public $name;

    /**
     * @var bool|null
     */
    public $is_breakdown;

    /**
     * @var bool|null
     */
    public $requires_id;

    /**
     * @var array|null
     */
    public $pairs_with;
}