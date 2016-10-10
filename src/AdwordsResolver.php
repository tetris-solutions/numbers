<?php
namespace Tetris\Numbers;

use Tetris\Adwords\Client;
use Tetris\Adwords\Exceptions\NullReportException;
use Tetris\Adwords\Request\Read\ReadInterface;

class AdwordsResolver extends Client implements Resolver
{
    use Filterable;
    const filterOperator = [
        'less than' => 'LESS_THAN',
        'greater than' => 'GREATER_THAN',
        'equals' => 'EQUALS',
        'contains' => 'CONTAINS',
        'between' => 'BETWEEN'
    ];

    private static function postProcessDimension(array $attribute, $value)
    {
        if ($attribute['type'] === 'integer' && is_numeric($value)) {
            return (int)$value;
        }

        return $value;
    }

    private static function applyFilter(ReadInterface $select, string $name, array $config)
    {
        $values = $config['values'];
        $firstValue = $values[0];

        if ($config['id'] === 'id') {
            if (count($values) > 1) {
                $select->where($name, $values, 'IN');
            } else {
                $select->where($name, $firstValue);
            }
        } else {
            if (!$config['is_filter']) return;

            $operator = self::filterOperator[$firstValue];
            $type = NULL;

            if ($config['type'] === 'money') {
                $values[1] = empty($values[1]) ? 0 : intval(floatval($values[1]) * (10 ** 6));
                $values[2] = empty($values[2]) ? 0 : intval(floatval($values[2]) * (10 ** 6));
            } else if ($config['is_percentage']) {
                $values[1] = empty($values[1]) ? 0 : floatval($values[1]) / 100;
                $values[2] = empty($values[2]) ? 0 : floatval($values[2]) / 100;
            }

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

            foreach ($config['filters'] as $filterProperty => $filterConfig) {
                if ($filterConfig['id'] === 'id' || !$shouldAggregateResult) {
                    self::applyFilter($select, $filterProperty, $filterConfig);
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

            $dimensions = array_flip($config['dimensions']);
            foreach ($reportRows as $index => $reportRow) {
                foreach ($config['metrics'] as $metric) {
                    if ($metric['is_auxiliary']) {
                        unset($reportRow->{$metric['id']});
                    }
                }

                foreach ($dimensions as $dimension => $name) {
                    if (!isset($config['attributes'][$dimension])) continue;

                    $reportRow->{$dimension} = self::postProcessDimension(
                        $config['attributes'][$dimension],
                        $reportRow->{$dimension}
                    );
                }

                $reportRows[$index] = $reportRow;
            }

            $rows = array_merge($rows, self::filterRows($reportRows, $config['filters']));
        }

        return $rows;
    }
}