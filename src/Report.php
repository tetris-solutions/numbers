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
    }

    function setFilter(string $name, $values)
    {
        if (empty($this->attributes[$name])) {
            return;
        }

        $attribute = $this->attributes[$name];
        $property = $attribute['property'];

        if (empty($this->filters[$property])) {
            $attribute['values'] = $values;
            $this->filters[$property] = $attribute;
        }
    }

    function includeField(string $name, bool $isDimension, $property = null)
    {
        if (!$property) {
            $attribute = $this->attributes[$name];
            $property = $attribute['property'];
        }

        if ($isDimension) {
            $this->dimensions[$property] = $name;
        }

        $this->fields[$property] = $name;
    }
}