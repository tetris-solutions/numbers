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


    function resolve(Query $query, bool $aggregateMode): array
    {
        $this->SetClientCustomerId($query->adAccountId);

        $report = $query->report;

        $select = $this->select($report->fields)
            ->from($report->name)
            ->during($query->since, $query->until);

        foreach ($report->filters as $filterProperty => $filterConfig) {
            $postParsingFilter = $filterConfig['is_metric'] && $aggregateMode;

            if (!$postParsingFilter) {
                self::applyFilter($select, $filterProperty, $filterConfig);
            }
        }

        try {
            return $select->fetchAll();
        } catch (NullReportException $e) {
            return [];
        }
    }
}