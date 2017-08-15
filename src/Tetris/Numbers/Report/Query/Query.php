<?php

namespace Tetris\Numbers\Report\Query;

use Exception;
use DateTime;
use Tetris\Numbers\Report\Report;
use Tetris\Numbers\Base\FilterMetaData;
use Tetris\Numbers\Base\Metric;
use Tetris\Numbers\Report\MetaData\MetaDataV2;

class Query extends QueryBlueprint
{
    protected static $requiredParameters = [
        'tetris_account',
        'entity',
        'metrics',
        'platform'
    ];

    /**
     * @var Report
     */
    public $report;

    function __construct(string $locale, array $query)
    {
        self::validateQuery($query);
        $this->locale = $locale;
        $this->init($query);

        if (empty($this->metrics)) {
            throw new Exception('metrics is required', self::BAD_REQUEST_CODE);
        }

        $this->setupReport();
    }

    private function init(array $query)
    {
        $this->metrics = [];
        $this->entity = $query['entity'];
        $this->platform = $query['platform'];
        $this->tetrisAccountId = $query['tetris_account'];
        $this->adAccountId = $query['ad_account'] ?? null;

        if ($this->platform === 'analytics') {
            $this->gaViewId = $query['ga_view_id'];
            $this->gaPropertyId = $query['ga_property_id'];
        }

        $this->since = new DateTime($query['from']);
        $this->until = new DateTime($query['to']);

        $this->metrics = array_map([$this, 'mountMetric'], $query['metrics']);
        $this->dimensions = $query['dimensions'] ?? [];
        $this->filters = $query['filters'] ?? [];
    }

    private static function validateQuery(array $query)
    {
        foreach (self::$requiredParameters as $key) {
            if (empty($query[$key])) {
                throw new Exception(
                    "Invalid Request: parameter {$key} is required",
                    self::BAD_REQUEST_CODE
                );
            }
        }

        if (empty($query['from']) || empty($query['to'])) {
            throw new Exception(
                "Invalid Request: a date filter is required. " .
                "You must set param 'from' and 'to'",
                self::BAD_REQUEST_CODE
            );
        }
    }

    protected function mountMetric(string $id): Metric
    {
        $source = MetaDataV2::getMetricSource($this->platform, $this->entity, $id);
        $source->name = MetaDataV2::getFieldName($this->locale, $this->platform, $id);

        return $source;
    }

    protected function setupReport()
    {
        /**
         * @var Metric $metric
         */
        foreach ($this->metrics as $metric) {
            if (!$this->report) {
                $this->report = new Report($this->platform, $metric->report);
            }

            $this->report->addMetric($metric, false);
        }

        foreach ($this->dimensions as $dimension) {
            $this->report->addDimension($dimension);
        }

        /**
         * @var Metric $metric
         */
        foreach ($this->metrics as $metric) {
            if (isset($metric->inferred_from)) {
                foreach ($metric->inferred_from as $subMetric) {
                    $this->report->addMetric($this->mountMetric($subMetric), true);
                }
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
