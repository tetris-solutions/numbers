<?php

namespace Tetris\Numbers\Generator\Shared;

use Tetris\Numbers\Base\Field;
use Tetris\Numbers\Base\Metric;

class MetricFactory extends FieldFactory
{
    /**
     * @var array
     */
    protected $extensions;
    protected static $parentClass = Metric::class;

    protected function apply(TransientMetric $config, Extension $extension): Field
    {
        return $extension->extend($config);
    }

    function create(string $id, string $property, string $type, string $entity, string $report): TransientMetric
    {
        $source = new TransientMetric();

        $source->id = $id;
        $source->platform = $this->platform;
        $source->path = "{$source->platform}/Metrics/$entity";
        $source->parent = self::$parentClass;
        $source->metric = $id;
        $source->entity = $entity;
        $source->fields = [$property];
        $source->property = $property;
        $source->type = $type;
        $source->report = $report;

        return array_reduce($this->extensions, [$this, 'apply'], $source);
    }
}