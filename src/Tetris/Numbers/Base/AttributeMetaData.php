<?php

namespace Tetris\Numbers\Base;

class AttributeMetaData extends Attribute
{
    /**
     * @var string
     */
    public $name;
    /**
     * @var bool
     */
    public $is_breakdown;
    /**
     * @var bool
     */
    public $requires_id;
    /**
     * @var array|null
     */
    public $pairs_with;
}
