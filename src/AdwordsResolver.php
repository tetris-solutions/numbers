<?php
namespace Tetris\Numbers;

use Tetris\Adwords\Client;
use Tetris\Adwords\Exceptions\NullReportException;
use Tetris\Adwords\Request\Read\ReadInterface;

class AdwordsResolver extends Client implements Resolver
{
    const filterOperator = [
        'less than' => 'LESS_THAN',
        'greater than' => 'GREATER_THAN',
        'equals' => 'EQUALS',
        'contains' => 'CONTAINS',
        'between' => 'BETWEEN'
    ];

    private static function parseFilter(ReadInterface $select, string $name, array $values)
    {
        $firstValue = $values[0];
        $idFilter = !array_key_exists($firstValue, self::filterOperator);

        if ($idFilter) {
            if (count($values) > 1) {
                $select->where($name, $values, 'IN');
            } else {
                $select->where($name, $firstValue);
            }
        } else {
            $operator = self::filterOperator[$firstValue];

            if ($operator === 'BETWEEN') {
                $select->where($name, $values[1], 'GREATER_THAN');
                $select->where($name, $values[2], 'LESS_THAN');
            } else {
                $select->where($name, $values[1], $operator);
            }
        }
    }

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
                self::parseFilter($select, $filter, $values);
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