<?php

namespace Tetris\Numbers\Generator;


trait ExtensionApply
{
    public $map;

    function patch(array $config): array
    {
        return isset($this->map[$config['metric']])
            ? $this->map[$config['metric']]
            : [];
    }

    function extend(array $config): array
    {
        foreach ($this->patch($config) as $key => $value) {
            if ($key === 'traits' || $key === 'interfaces') {
                $value = array_merge($config[$key] ?? [], $value);
            } else if (isset($config[$key])) {
                unset($config[$key]);
            }

            $config[$key] = $value;
        }

        return $config;
    }
}