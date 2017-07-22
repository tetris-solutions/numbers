<?php

namespace Tetris\Numbers\Report;

use Tetris\Numbers\Report\MetaData\MetaData;

class Report extends ReportBlueprint
{
    function __construct(string $platform, string $name)
    {
        parent::__construct($platform, $name);
        $this->attributes = MetaData::getReport($platform, $name);
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
}