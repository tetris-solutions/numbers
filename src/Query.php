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

    private function parseMetrics(array $metrics, string $entity, string $platform): array
    {
        return array_map(function ($id) use ($entity, $platform):array {
            $metric = MetaData::getMetric($id);
            $source = MetaData::getMetricSource($platform, $entity, $id);

            if (isset($metric['names'][$this->locale])) {
                $metric['name'] = $metric['names'][$this->locale];
            } else {
                $metric['name'] = MetaData::getFieldName($this->locale, $platform, $id);
            }

            return [
                'id' => $metric['id'],
                'name' => $metric['name'],
                'type' => $metric['type'],
                'metric' => $source['metric'],
                'parse' => $source['parse'],
                'entity' => $entity,
                'platform' => $platform,
                'fields' => array_combine($source['fields'], $source['fields']),
                'report' => $source['report']
            ];
        }, $metrics);
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
                $values = explode('|', substr($filter, $openParentheses + 1, -1));

                if (empty($values)) continue;

                $filters[$key] = $values;
            }
        }

        return $filters;
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

        $this->metrics = empty($query['metrics'])
            ? []
            : $this->parseMetrics(explode(',', $query['metrics']), $this->entity, $this->platform);

        $this->filters = empty($query['filters'])
            ? []
            : self::parseFilters(explode(',', $query['filters']));

        $this->dimensions = empty($query['dimensions'])
            ? []
            : explode(',', $query['dimensions']);
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

            $currentReport = isset($reports[$reportId]) ? $reports[$reportId] : [
                'fields' => [],
                'metrics' => [],
                'filters' => [],
                'dimensions' => []
            ];

            $attributeNameMap = [
                'filters' => [],
                'dimensions' => []
            ];

            $attributes = MetaData::getReport($this->platform, $reportId);

            foreach ($attributes as $id => $attribute) {
                if ($attribute['is_dimension']) {
                    $attributeNameMap['dimensions'][$id] = $attribute['property'];
                }
                if ($attribute['is_filter']) {
                    $attributeNameMap['filters'][$id] = $attribute['property'];
                }
            }


            foreach ($this->filters as $sourceAttributeName => $value) {
                if (isset($attributeNameMap['filters'][$sourceAttributeName])) {
                    $targetAttributeName = $attributeNameMap['filters'][$sourceAttributeName];
                    $metric['filters'][$targetAttributeName] = $value;
                }
            }

            foreach ($this->dimensions as $sourceAttributeName) {
                if (isset($attributeNameMap['dimensions'][$sourceAttributeName])) {
                    $targetAttributeName = $attributeNameMap['dimensions'][$sourceAttributeName];
                    $metric['dimensions'][$targetAttributeName] = $sourceAttributeName;

                    if (empty($metric['fields'][$targetAttributeName])) {
                        $metric['fields'][$targetAttributeName] = $sourceAttributeName;
                    }
                }
            }

            $currentReport['metrics'][] = $metric;

            foreach (['dimensions', 'filters', 'fields'] as $configKey) {
                $currentReport[$configKey] = array_unique(
                    array_merge(
                        $currentReport[$configKey],
                        $metric[$configKey]
                    )
                );
            }

            $reports[$reportId] = $currentReport;
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