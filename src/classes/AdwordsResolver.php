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
        'not equals' => 'NOT_EQUALS',
        'contains' => 'CONTAINS',
        'between' => 'BETWEEN'
    ];

    const requiredFields = [
        'GEO_PERFORMANCE_REPORT' => ['CountryCriteriaId']
    ];

    private static function applyFilter(ReadInterface $select, array $config)
    {
        $adwordsProperty = $config['property'];
        $values = $config['values'];
        $firstValue = $values[0];

        if ($config['id'] === 'id') {
            if (count($values) > 1) {
                $select->where($adwordsProperty, $values, 'IN');
            } else {
                $select->where($adwordsProperty, $firstValue);
            }
        } else {
            if (
                !$config['is_filter'] ||
                $config['type'] === 'list' // filtering on Lists is buggy (even using CONTAINS_ALL)
            ) {
                return;
            }

            $operator = self::filterOperator[$firstValue];
            $type = NULL;

            if ($config['type'] === 'currency') {
                $values[1] = empty($values[1]) ? 0 : intval(floatval($values[1]) * (10 ** 6));
                $values[2] = empty($values[2]) ? 0 : intval(floatval($values[2]) * (10 ** 6));
            } else if ($config['is_percentage']) {
                // @todo double-check this
                $values[1] = empty($values[1]) ? 0 : floatval($values[1]) / 100;
                $values[2] = empty($values[2]) ? 0 : floatval($values[2]) / 100;
            }

            if ($operator === 'BETWEEN') {
                $select->where($adwordsProperty, $values[1], 'GREATER_THAN');
                $select->where($adwordsProperty, $values[2], 'LESS_THAN');
            } else {
                $select->where($adwordsProperty, $values[1], $operator);
            }
        }
    }

    private function addRequired(string $reportName, array $fields): array
    {
        if (empty(self::requiredFields[$reportName])) return $fields;

        foreach (self::requiredFields[$reportName] as $index => $field) {
            if (isset($fields[$field])) continue;

            $fields[$field] = "_required{$index}_";
        }

        return $fields;
    }

    function resolve(Query $query, bool $aggregateMode): array
    {
        $this->SetClientCustomerId($query->adAccountId);

        $report = $query->report;

        $select = $this->select($this->addRequired($report->name, $report->fields))
            ->from($report->name)
            ->during($query->since, $query->until);

        foreach ($report->filters as $attributeId => $filterConfig) {
            $postParsingFilter = $filterConfig['is_metric'] && $aggregateMode;

            if (!$postParsingFilter) {
                self::applyFilter($select, $filterConfig);
            }
        }

        try {
            return $select->fetchAll();
        } catch (NullReportException $e) {
            return [];
        }
    }
}