<?php

namespace Tetris\Numbers\Generator\Shared;

use Tetris\Numbers\Base\Field;

trait ExtensionApply
{
    /**
     * @var array
     */
    public $map = [];

    function patch(Field $source): array
    {
        return isset($this->map[$source->id])
            ? $this->map[$source->id]
            : [];
    }

    /**
     * @param TransientMetric|TransientAttribute $config
     * @return TransientMetric|TransientAttribute
     */
    function extend($config)
    {
        foreach ($this->patch($config) as $key => $value) {
            if ($key === 'traits' || $key === 'interfaces') {
                $value = array_merge($config->{$key} ?? [], $value);
            }

            $config->{$key} = $value;
        }

        return $config;
    }
}