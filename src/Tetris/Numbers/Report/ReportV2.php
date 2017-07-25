<?php

namespace Tetris\Numbers\Report;

use Tetris\Numbers\Base\Attribute;
use Tetris\Numbers\Base\FilterMetaData;
use Tetris\Numbers\Report\MetaData\MetaDataV2;
use Tetris\Numbers\Utils\ObjectUtils;

class ReportV2 extends ReportBlueprint
{
    function __construct(string $platform, string $name)
    {
        parent::__construct($platform, $name);
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
}