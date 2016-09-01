<?php
namespace Tetris\Numbers;

use Tetris\Adwords\Client;
use Tetris\Adwords\Exceptions\NullReportException;

class AdwordsResolver extends Client implements Resolver
{
    function resolve(Query $query): array
    {
        $rows = [];
        $entityIdField = "{$query->entity}Id";
        $this->SetClientCustomerId($query->adAccountId);

        foreach ($query->reports as $reportName => $config) {
            $shouldAggregateResult = count($query->filters['id']) > 1 &&
                !isset($config['fields'][$entityIdField]);

            $select = $this->select($config['fields'])
                ->from($reportName)
                ->during($query->since, $query->until);

            foreach ($config['filters'] as $filter => $values) {
                if (count($values) > 1) {
                    $select->where($filter, $values, 'IN');
                } else {
                    $select->where($filter, $values[0]);
                }
            }

            try {
                $reportRows = $select->fetchAll();
            } catch (NullReportException $e) {
                $reportRows = [];
            }

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