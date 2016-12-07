<?php

namespace Tetris\Numbers;


class Report
{
    public $dimensions;
    public $fields;
    public $filters;
    public $metrics;
    public $attributes;
    public $name;

    function __construct(string $platform, string $name)
    {
        $this->name = $name;
        $this->attributes = MetaData::getReport($platform, $name);
        $this->dimensions = [];
        $this->metrics = [];
        $this->fields = [];
        $this->filters = [];
        $this->auxiliary = [];
    }

    function addFilter(string $attributeId, $values)
    {
        if (empty($this->attributes[$attributeId])) {
            return null;
        }

        $attribute = $this->attributes[$attributeId];
        $property = $attribute['property'];

        if (isset($this->filters[$property])) {
            return null;
        }

        $attribute['values'] = $values;
        $this->filters[$attributeId] = $attribute;

        return $attribute;
    }

    function addDimension(string $dimensionId, $isAuxiliary = false)
    {
        $unknownDimension = empty($this->attributes[$dimensionId]);

        if ($unknownDimension) return;

        $attribute = $this->attributes[$dimensionId];
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

    function addMetric(array $metric, $isAuxiliary = false)
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