<?php

namespace Tetris\Numbers\Report\Query;

use Tetris\Numbers\Base\SourceMetaData;
use Tetris\Numbers\Report\MetaData\MetaDataV2;
use Tetris\Numbers\Report\Report;
use Tetris\Numbers\Utils\ObjectUtils;

class QueryV2 extends QueryBase
{
    protected function mountMetric(string $id): SourceMetaData
    {
        $source = MetaDataV2::getMetricSource($this->platform, $this->entity, $id);
        /**
         * @var SourceMetaData $sourceMetaData
         */
        $sourceMetaData = ObjectUtils::cast(SourceMetaData::class, $source);
        $sourceMetaData->name = MetaDataV2::getFieldName($this->locale, $this->platform, $id);

        return $sourceMetaData;
    }

    protected function setupReport()
    {
        $this->report = new Report($this->platform, $this->metrics[0]['report']);

        foreach ($this->metrics as $metric) {
            $this->report->addMetric($metric, false);
        }

        foreach ($this->dimensions as $dimension) {
            $this->report->addDimension($dimension);
        }

        foreach ($this->metrics as $metric) {
            foreach ($metric['inferred_from'] as $subMetric) {
                $this->report->addMetric($this->mountMetric($subMetric), true);
            }
        }

        foreach ($this->filters as $name => $values) {
            $attribute = $this->report->addFilter($name, $values);

            if ($attribute['is_dimension'] && $name !== 'id') {
                $this->report->addDimension($attribute['id'], true);
            }

            if ($attribute['is_metric']) {
                $this->report->addMetric($this->mountMetric($attribute['id']), true);
            }
        }
    }
}
