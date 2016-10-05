<?php

namespace Tetris\Numbers;

use DateTime;

class Query
{
    static private $requiredParameters = [
        'ad_account',
        'tetris_account',
        'entity',
        'metrics',
        'platform'
    ];

    /**
     * @var array
     */
    public $reports = [];
    /**
     * @var string
     */
    private $locale;
    /**
     * @var string $tetrisAccountId
     */
    public $tetrisAccountId;

    /**
     * @var array $dimensions
     */
    public $dimensions;

    /**
     * @var string $entity
     */
    public $entity;

    /**
     * @var array $filters
     */
    public $filters;
    /**
     * ad account
     * @var string $adAccountId
     */
    public $adAccountId;
    /**
     * @var array $metrics
     */
    public $metrics;
    /**
     * @var DateTime $since
     */
    public $since;
    /**
     * @var DateTime $until
     */
    public $until;

    /**
     * @var string $platform
     */
    public $platform;

    private static function validateQuery(array $query)
    {
        foreach (self::$requiredParameters as $key) {
            if (empty($query[$key])) {
                throw new \Exception("Invalid Request: parameter {$key} is required", 400);
            }
        }

        if (empty($query['at']) && (empty($query['from']) || empty($query['to']))) {
            throw new \Exception("Invalid Request: a date filter is required. " .
                "Either set param 'at' or 'from' and 'to'", 400);
        }
    }

    private function getMetric(string $id): array
    {
        $metric = MetaData::getMetric($id);
        $source = MetaData::getMetricSource($this->platform, $this->entity, $id);

        if (isset($metric['names'][$this->locale])) {
            $metric['name'] = $metric['names'][$this->locale];
        } else {
            $metric['name'] = MetaData::getFieldName($this->locale, $this->platform, $id);
        }

        return [
            'id' => $metric['id'],
            'name' => $metric['name'],
            'type' => $metric['type'],
            'metric' => $source['metric'],
            'parse' => $source['parse'],
            'inferred_from' => isset($source['inferred_from'])
                ? $source['inferred_from']
                : [],
            'entity' => $this->entity,
            'platform' => $this->platform,
            'fields' => array_combine($source['fields'], $source['fields']),
            'report' => $source['report']
        ];
    }

    function __construct(string $locale, array $query)
    {
        self::validateQuery($query);

        $this->locale = $locale;
        $this->metrics = [];
        $this->entity = $query['entity'];
        $this->platform = $query['platform'];
        $this->tetrisAccountId = $query['tetris_account'];
        $this->adAccountId = $query['ad_account'];

        if (isset($query['at'])) {
            $this->until = $this->since = new DateTime($query['at']);
        } else {
            $this->since = new DateTime($query['from']);
            $this->until = new DateTime($query['to']);
        }

        $this->metrics = is_array($query['metrics'])
            ? $query['metrics']
            : [];
        $this->metrics = array_map([$this, 'getMetric'], $this->metrics);

        $this->dimensions = is_array($query['dimensions'])
            ? $query['dimensions']
            : [];

        $this->filters = is_array($query['filters'])
            ? $query['filters']
            : [];

        foreach ($this->metrics as $metric) {
            $this->createReportConfigFromMetric($metric, false);
        }

        foreach ($this->metrics as $metric) {
            foreach ($metric['inferred_from'] as $subMetric) {
                $this->createReportConfigFromMetric($this->getMetric($subMetric), true);
            }
        }
    }

    private function createReportConfigFromMetric(array $metric, bool $isAuxiliary)
    {
        $reportId = $metric['report'];
        $metricId = $metric['id'];
        $currentReport = isset($this->reports[$reportId]) ? $this->reports[$reportId] : [
            'fields' => [],
            'metrics' => [],
            'filters' => [],
            'dimensions' => []
        ];

        if (isset($currentReport['metrics'][$metricId])) return;

        // dynamic attributes
        $metric['is_auxiliary'] = $isAuxiliary;
        $metric['filters'] = [];
        $metric['dimensions'] = [];

        $attributes = MetaData::getReport($this->platform, $reportId);

        foreach ($this->filters as $sourceAttributeName => $values) {
            if (isset($attributes[$sourceAttributeName]) && $attributes[$sourceAttributeName]['is_filter']) {
                $targetAttributeName = $attributes[$sourceAttributeName]['property'];

                $metric['filters'][$targetAttributeName] = array_merge(
                    $attributes[$sourceAttributeName],
                    ['values' => $values]
                );
            }
        }

        foreach ($this->dimensions as $sourceAttributeName) {
            if (isset($attributes[$sourceAttributeName]) && $attributes[$sourceAttributeName]['is_dimension']) {
                $targetAttributeName = $attributes[$sourceAttributeName]['property'];
                $metric['dimensions'][$targetAttributeName] = $sourceAttributeName;

                if (empty($metric['fields'][$targetAttributeName])) {
                    $metric['fields'][$targetAttributeName] = $sourceAttributeName;
                }
            }
        }

        $currentReport['metrics'][$metricId] = $metric;

        $currentReport['dimensions'] = array_merge($currentReport['dimensions'], $metric['dimensions']);
        $currentReport['filters'] = array_merge($currentReport['filters'], $metric['filters']);
        $currentReport['fields'] = array_unique(array_merge($currentReport['fields'], $metric['fields']));

        $this->reports[$reportId] = $currentReport;
    }
}