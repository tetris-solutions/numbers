<?php

namespace Tetris\Numbers\Generator;


trait Transient
{
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

    /**
     * @var array
     */
    protected $blacklist = [];

    function asArray(): array
    {
        $array = [];

        foreach (get_object_vars($this) as $key => $value) {
            $isLegacyAttribute = !in_array($key, $this->blacklist) && (
                    property_exists(get_parent_class($this), $key) ||
                    property_exists(LegacyTransient::class, $key)
                );

            if ($isLegacyAttribute && isset($value)) {
                $array[$key] = $value;
            }
        }

        return $array;
    }
}
