<?php

namespace Tetris\Numbers\Report;

use Tetris\Numbers\Base\Metric;
use Tetris\Numbers\Base\Attribute;
use Tetris\Numbers\Base\FilterMetaData;
use Tetris\Numbers\Report\MetaData\MetaDataV2;
use Tetris\Numbers\Utils\ObjectUtils;

class ReportV2
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
        $this->attributes = MetaDataV2::getReport($platform, $name);
    }

    /**
     * @param string $attributeId
     * @param $values
     * @return null|FilterMetaData
     */
    function addFilter(string $attributeId, $values)
    {
        if (empty($this->attributes[$attributeId]) || isset($this->filters[$attributeId])) {
            return null;
        }

        /**
         * @var Attribute $attribute
         */
        $attribute = $this->attributes[$attributeId];

        /**
         * @var FilterMetaData $filter
         */
        $filter = ObjectUtils::cast(FilterMetaData::class, $attribute);

        $filter->spec = $values;

        $this->filters[$attributeId] = $filter;

        return $filter;
    }

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
     * @param Metric|array $metric
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