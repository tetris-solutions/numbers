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
     * @var string $tetrisAccount
     */
    protected $tetrisAccount;

    /**
     * @var string $entity
     */
    protected $entity;
    /**
     * ad account
     * @var string $adAccount
     */
    protected $adAccount;
    /**
     * @var array $requestedMetrics
     */
    protected $requestedMetrics;
    /**
     * @var array $metrics
     */
    protected $metrics;
    /**
     * @var DateTime $since
     */
    protected $since;
    /**
     * @var DateTime $until
     */
    protected $until;

    /**
     * @var string $platform
     */
    protected $platform;

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

    function __construct(array $query)
    {
        self::validateQuery($query);

        $this->metrics = [];
        $this->entity = $query['entity'];
        $this->platform = $query['platform'];
        $this->requestedMetrics = explode(',', $query['metrics']);

        sort($this->requestedMetrics);

        $this->tetrisAccount = $query['tetris_account'];
        $this->adAccount = $query['ad_account'];

        if (isset($query['at'])) {
            $this->until = $this->since = new DateTime($query['at']);
        } else {
            $this->since = new DateTime($query['from']);
            $this->until = new DateTime($query['to']);
        }
    }

    function load()
    {
        $query = sql::select([
            'metric.id',
            'metric.name',
            'metric.platform',
            'metric.type'])
            ->from('metric')
            ->where('metrid.id = ?', $this->requestedMetrics[0]);

        for ($i = 1; $i < count($this->requestedMetrics); $i++) {
            $query->orWhere('metrid.id = ?', $this->requestedMetrics[$i]);
        }

        $metrics = sql::run($query)->fetchAll();
        $foundMetrics = [];

        foreach ($metrics as $metric) {
            $source = sql::run(sql::select([
                'metric_source.id',
                'metric_source.metric',
                'metric_source.entity',
                'metric_source.platform',
                'metric_source.fields',
                'metric_source.report'])
                ->from('metric_source')
                ->where('metric_source.metric = ?', $metric['id'])
                ->where('metric_source.entity = ?', $this->entity)
                ->where('metric_source.platform = ?', $this->platform))
                ->fetchObject();

            if (empty($source)) {
                throw new \Exception("Metric '{$metric['name']}' can not be used with {$this->entity}@{$this->platform}", 400);
            }

            $foundMetrics[] = $metric['id'];
            $this->metrics[] = [
                'name' => $metric['name'],
                'type' => $metric['type'],
                'metric' => $source->metric,
                'entity' => $this->entity,
                'platform' => $this->platform,
                'fields' => json_decode($source->fields),
                'report' => $source->report
            ];
        }

        sort($foundMetrics);
        $notFound = array_diff($this->requestedMetrics, $foundMetrics);

        if (!empty($notFound)) {
            throw new \Exception("Invalid metrics: " . implode(', ', $notFound));
        }
    }
}