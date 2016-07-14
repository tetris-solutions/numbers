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
     * @var string $tetrisAccountId
     */
    public $tetrisAccountId;

    /**
     * @var array $groupBy
     */
    public $groupBy;

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

    private static function parseMetrics(array $requestedMetrics, string $entity, string $platform): array
    {
        $query = sql::select([
            'metric.id',
            'metric.name',
            'metric.type'])
            ->from('metric')
            ->where('metric.id = ?', $requestedMetrics[0]);

        for ($i = 1; $i < count($requestedMetrics); $i++) {
            $query->orWhere('metric.id = ?', $requestedMetrics[$i]);
        }

        $metricsFromDatabase = sql::run($query)->fetchAll();
        $foundMetrics = [];
        $parsedMetrics = [];

        foreach ($metricsFromDatabase as $metric) {
            $source = sql::run(sql::select([
                'metric_source.id',
                'metric_source.metric',
                'metric_source.entity',
                'metric_source.platform',
                'metric_source.fields',
                'metric_source.eval',
                'metric_source.report'])
                ->from('metric_source')
                ->where('metric_source.metric = ?', $metric['id'])
                ->where('metric_source.entity = ?', $entity)
                ->where('metric_source.platform = ?', $platform))
                ->fetchObject();

            if (empty($source)) {
                throw new \Exception("Metric '{$metric['name']}' can not be used with {$entity}@{$platform}", 400);
            }

            $foundMetrics[] = $metric['id'];
            $parsedMetrics[] = [
                'id' => $metric['id'],
                'name' => $metric['name'],
                'type' => $metric['type'],
                'metric' => $source->metric,
                'eval' => $source->eval,
                'entity' => $entity,
                'platform' => $platform,
                'fields' => json_decode($source->fields),
                'report' => $source->report
            ];
        }

        sort($foundMetrics);
        sort($requestedMetrics);
        $notFound = array_diff($requestedMetrics, $foundMetrics);

        if (!empty($notFound)) {
            throw new \Exception("Invalid metrics: " . implode(', ', $notFound));
        }

        return $parsedMetrics;
    }

    /**
     *
     * filter syntax
     *  - id(123)
     *  - id[123|456]
     *
     * @param array $rawFilters
     * @return array
     */
    private static function parseFilters(array $rawFilters)
    {
        $filters = [];

        foreach ($rawFilters as $filter) {
            if (strpos($filter, '(') !== false) {
                $openParentheses = strpos($filter, '(');
                $key = substr($filter, 0, $openParentheses);
                $value = substr($filter, $openParentheses + 1, -1);
                $filters[$key] = $value;
            } else if (strpos($filter, '[') !== false) {
                $openParentheses = strpos($filter, '(');
                $key = substr($filter, 0, $openParentheses);
                $values = explode('|', substr($filter, $openParentheses + 1, -1));
                $filters[$key] = $values;
            }
        }

        return $filters;
    }

    function __construct(array $query)
    {
        self::validateQuery($query);

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

        $this->metrics = empty($query['metrics'])
            ? []
            : self::parseMetrics(explode(',', $query['metrics']), $this->entity, $this->platform);

        $this->filters = empty($query['filters'])
            ? []
            : self::parseFilters(explode(',', $query['filters']));

        $this->groupBy = empty($query['group_by'])
            ? []
            : explode(',', $query['group_by']);
    }

    /**
     * group metrics by report,
     * for calculating operations
     *
     * @return array
     */
    function getReports()
    {
        $reports = [];

        foreach ($this->metrics as $metric) {
            $reportId = $metric['report'];

            $metric['filters'] = [];
            $metric['dimensions'] = [];

            $reports[$reportId] = isset($reports[$reportId]) ? $reports[$reportId] : [
                'fields' => [],
                'metrics' => [],
                'filters' => [],
                'dimensions' => []
            ];

            $r = sql::run(sql::select([
                'report.dimensions',
                'report.filters'])
                ->from('report')
                ->where('report.id = ?', $reportId))
                ->fetchObject();

            $report = [
                'filters' => empty($r->filters) ? [] : json_decode($r->filters, true),
                'dimensions' => empty($r->dimensions) ? [] : json_decode($r->dimensions, true)
            ];


            foreach ($this->filters as $name => $value) {
                if (isset($report['filters'][$name])) {
                    $field = $report['filters'][$name];
                    $metric['filters'][$field] = $value;
                }
            }

            foreach ($this->groupBy as $column) {
                if (isset($report['dimensions'][$column])) {
                    $metric['dimensions'][] = $report['dimensions'][$column];
                }
            }

            $reports[$reportId]['metrics'][] = $metric;

            foreach (['dimensions', 'filters', 'fields'] as $key) {
                $reports[$reportId][$key] = array_unique(
                    array_merge(
                        $reports[$reportId][$key],
                        $metric[$key]
                    )
                );
            }
        }

        return $reports;
    }

    function getPlatform(): string
    {
        return $this->platform;
    }

    function getTetrisAccountId() : string
    {
        return $this->tetrisAccountId;
    }

    function getAdAccountId(): string
    {
        return $this->adAccountId;
    }
}