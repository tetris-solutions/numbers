<?php

namespace Tetris\Numbers\Report\Query;

use Exception;
use Tetris\Numbers\Report\Report;
use DateTime;

abstract class Base extends Blueprint
{
    protected static $requiredParameters = [
        'ad_account',
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
            throw new Exception('metrics is required', Blueprint::BAD_REQUEST_CODE);
        }

        $this->setupReport();
    }

    abstract protected function setupReport();

    abstract protected function mountMetric(string $id);

    private function init(array $query)
    {
        $this->metrics = [];
        $this->entity = $query['entity'];
        $this->platform = $query['platform'];
        $this->tetrisAccountId = $query['tetris_account'];
        $this->adAccountId = $query['ad_account'];

        if ($this->platform === 'analytics') {
            $this->gaViewId = $query['ga_view_id'];
            $this->gaPropertyId = $query['ga_property_id'];
        }

        $this->since = new DateTime($query['from']);
        $this->until = new DateTime($query['to']);

        $this->metrics = array_map([$this, 'mountMetric'], $query['metrics']);
        $this->dimensions = $query['dimensions'];
        $this->filters = $query['filters'];
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
}
