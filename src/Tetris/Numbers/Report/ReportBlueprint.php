<?php

namespace Tetris\Numbers\Report;


use Tetris\Numbers\Base\MetricMetaData;

abstract class ReportBlueprint
{
    public $dimensions = [];
    public $fields = [];
    public $filters = [];
    public $metrics = [];
    public $attributes = [];
    public $auxiliary = [];
    public $name;

    function __construct(string $platform, string $name)
    {
        $this->name = $name;
    }

    abstract function addFilter(string $attributeId, $values);

    function addDimension(string $dimensionId, $isAuxiliary = false)
    {
        $attribute = $this->attributes[$dimensionId] ?? null;

        if (!$attribute) return;

        $property = $attribute['property'];

        if ($property) {
            $this->fields[$property] = $property;
        }

        $alreadyDefined = isset($this->dimensions[$dimensionId]);

        if ($alreadyDefined) return;

        $this->dimensions[$dimensionId] = $attribute;

        if ($isAuxiliary) {
            $this->auxiliary[$dimensionId] = $dimensionId;
        }
    }

    /**
     * @param MetricMetaData|array $metric
     * @param bool $isAuxiliary
     */
    function addMetric($metric, $isAuxiliary = false)
    {
        $metricId = $metric['id'];

        if (isset($this->metrics[$metricId])) return;

        foreach ($metric['fields'] as $property) {
            $this->fields[$property] = $property;
        }

        $this->metrics[$metricId] = $metric;

        if ($isAuxiliary) {
            $this->auxiliary[$metricId] = $metricId;
        }
    }
}