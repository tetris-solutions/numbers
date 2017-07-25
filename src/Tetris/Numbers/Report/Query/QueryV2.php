<?php

namespace Tetris\Numbers\Report\Query;

use Tetris\Numbers\Base\FilterMetaData;
use Tetris\Numbers\Base\MetricMetaData;
use Tetris\Numbers\Report\MetaData\MetaDataV2;
use Tetris\Numbers\Report\ReportV2;
use Tetris\Numbers\Utils\ObjectUtils;

class QueryV2 extends QueryBase
{
    protected function mountMetric(string $id): MetricMetaData
    {
        $source = MetaDataV2::getMetricSource($this->platform, $this->entity, $id);
        /**
         * @var MetricMetaData $sourceMetaData
         */
        $sourceMetaData = ObjectUtils::cast(MetricMetaData::class, $source);
        $sourceMetaData->name = MetaDataV2::getFieldName($this->locale, $this->platform, $id);

        return $sourceMetaData;
    }

    protected function setupReport()
    {
        /**
         * @var MetricMetaData $metric
         */
        foreach ($this->metrics as $metric) {
            if (!$this->report) {
                $this->report = new ReportV2($this->platform, $metric->report);
            }

            $this->report->addMetric($metric, false);
        }

        foreach ($this->dimensions as $dimension) {
            $this->report->addDimension($dimension);
        }

        /**
         * @var MetricMetaData $metric
         */
        foreach ($this->metrics as $metric) {
            foreach ($metric->inferred_from as $subMetric) {
                $this->report->addMetric($this->mountMetric($subMetric), true);
            }
        }

        foreach ($this->filters as $name => $values) {
            /**
             * @var FilterMetaData $filter
             */
            $filter = $this->report->addFilter($name, $values);

            if ($filter->is_dimension && $filter->id !== 'id') {
                $this->report->addDimension($filter->id, true);
            }

            if ($filter->is_metric) {
                $this->report->addMetric($this->mountMetric($filter->id), true);
            }
        }
    }
}
