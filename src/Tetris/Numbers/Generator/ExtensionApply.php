<?php

namespace Tetris\Numbers\Generator;


trait ExtensionApply
{
    /**
     * @var array|null
     */
    public $map;

    function patch(TransientMetric $source): array
    {
        return isset($this->map[$source->metric])
            ? $this->map[$source->metric]
            : [];
    }

    function extend(TransientMetric $config): TransientMetric
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