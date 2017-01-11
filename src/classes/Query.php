<?php

namespace Tetris\Numbers;

use DateTime;

class Query extends QueryBlueprint
{
    const BAD_REQUEST_CODE = 422;
    private static $requiredParameters = [
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

    private static function validateQuery(array $query)
    {
        foreach (self::$requiredParameters as $key) {
            if (empty($query[$key])) {
                throw new \Exception(
                    "Invalid Request: parameter {$key} is required",
                    self::BAD_REQUEST_CODE
                );
            }
        }

        if (empty($query['from']) || empty($query['to'])) {
            throw new \Exception(
                "Invalid Request: a date filter is required. " .
                "You must set param 'from' and 'to'",
                self::BAD_REQUEST_CODE
            );
        }
    }

    private function mountMetric(string $id): array
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
            'fields' => $source['fields'],
            'report' => $source['report'],
            'sum' => isset($source['sum']) ? $source['sum'] : null
        ];
    }

    function __construct(string $locale, array $query)
    {
        self::validateQuery($query);
        $this->locale = $locale;
        $this->init($query);

        if (empty($this->metrics)) {
            throw new \Exception('metrics is required', self::BAD_REQUEST_CODE);
        }

        $this->setupReport();
    }

    private function init(array $query)
    {
        $this->metrics = [];
        $this->entity = $query['entity'];
        $this->platform = $query['platform'];
        $this->tetrisAccountId = $query['tetris_account'];
        $this->adAccountId = $query['ad_account'];

        $this->since = new DateTime($query['from']);
        $this->until = new DateTime($query['to']);

        $this->metrics = array_map([$this, 'mountMetric'], $query['metrics']);
        $this->dimensions = $query['dimensions'];
        $this->filters = $query['filters'];
    }

    private function setupReport()
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

            if ($attribute['is_dimension']) {
                $this->report->addDimension($attribute['id'], true);
            }

            if ($attribute['is_metric']) {
                $this->report->addMetric($this->mountMetric($attribute['id']), true);
            }
        }
    }
}