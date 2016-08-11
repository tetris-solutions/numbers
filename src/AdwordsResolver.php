<?php
namespace Tetris\Numbers;

use Tetris\Adwords\Client;

class AdwordsResolver extends Client implements Resolver
{
    function resolve(Query $query): array
    {
        $rows = [];
        $this->SetClientCustomerId($query->adAccountId);
        $reports = $query->getReports();

        foreach ($reports as $reportName => $config) {
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

            $shouldAggregateResult = $reportName === 'CAMPAIGN_PERFORMANCE_REPORT' &&
                count($query->filters['id']) > 1 &&
                !isset($config['fields']['CampaignId']);

            if ($shouldAggregateResult) {
                $reportRows = aggregateResult($reportRows, $config);
            }

            $rows = array_merge($rows, $reportRows);
        }

        return $rows;
    }
}