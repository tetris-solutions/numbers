<?php
namespace Tetris\Numbers;

use Tetris\Adwords\Client;

class AdwordsResolver extends Client implements Resolver
{
    function resolve(Query $query): array
    {
        $rows = [];
        $this->SetClientCustomerId($query->adAccountId);

        foreach ($query->reports as $reportName => $config) {
            $shouldAggregateResult = $reportName === 'CAMPAIGN_PERFORMANCE_REPORT' &&
                count($query->filters['id']) > 1 &&
                !isset($config['fields']['CampaignId']);

            $requestFields = array_merge([
                // @see https://trello.com/c/7eQ1IsVm/103-suspeita-de-bug-report-api
                // @todo remove this ugly workaround
                'Impressions' => 'Impressions'
            ], $config['fields']);

            $select = $this->select($requestFields)
                ->from($reportName)
                ->during($query->since, $query->until);

            foreach ($config['filters'] as $filter => $values) {
                if (count($values) > 1) {
                    $select->where($filter, $values, 'IN');
                } else {
                    $select->where($filter, $values[0]);
                }
            }

            $reportRows = $select->fetchAll();

            foreach ($reportRows as $index => $row) {
                $reportRows[$index] = parseMetrics($row, $config);
            }

            if ($shouldAggregateResult) {
                $reportRows = aggregateResult($reportRows, $config);
            }

            foreach ($reportRows as $index => $reportRow) {
                foreach ($config['metrics'] as $metric) {
                    if ($metric['is_auxiliary']) {
                        unset($reportRow->{$metric['id']});
                    }
                }
            }

            $reportRows = array_values($reportRows);

            $rows = array_merge($rows, $reportRows);
        }

        return $rows;
    }
}