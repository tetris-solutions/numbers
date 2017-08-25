<?php

namespace Tetris\Numbers\Resolver;

use Tetris\Adwords\Client;
use Tetris\Adwords\Exceptions\NullReportException;
use Tetris\Adwords\Request\Read\ReadInterface;
use Tetris\Numbers\Base\FilterMetaData;
use Tetris\Numbers\Report\Query\Query;
use Tetris\Numbers\Report\Report;

class AdWordsResolver extends Client implements Resolver
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

    /**
     * @param ReadInterface $select
     * @param array|FilterMetaData $config
     */
    private static function applyFilter(ReadInterface $select, $config)
    {
        $adWordsProperty = $config['property'];

        $values = $config instanceof FilterMetaData
            ? $config->spec
            : $config['values'];

        $firstValue = $values[0];

        if ($config['id'] === 'id') {
            if (count($values) > 1) {
                $select->where($adWordsProperty, $values, 'IN');
            } else {
                $select->where($adWordsProperty, $firstValue);
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
                $select->where($adWordsProperty, $values[1], 'GREATER_THAN');
                $select->where($adWordsProperty, $values[2], 'LESS_THAN');
            } else {
                $select->where($adWordsProperty, $values[1], $operator);
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

    private function query(Query $query, bool $aggregateMode)
    {
        $select = $this->select($this->addRequired($query->report->name, $query->report->fields))
            ->from($query->report->name)
            ->during($query->since, $query->until);

        /**
         * @var FilterMetaData|array $filterConfig
         */
        foreach ($query->report->filters as $attributeId => $filterConfig) {
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

    function resolve(Query $query, bool $aggregateMode): array
    {
        $this->SetClientCustomerId($query->adAccountId);

        /**
         * @var FilterMetaData|null $idFilter
         */
        $idFilter = $query->report->filters['id'] ?? null;

        $result = [];

        $roll = function () use (&$result, &$query, $aggregateMode) {
            foreach ($this->query($query, $aggregateMode) as $row) {
                $result[] = $row;
            }
        };

        if ($idFilter && $idFilter->values) {
            $idGroups = array_chunk($idFilter->values, 5 * 1000);

            foreach ($idGroups as $ids) {
                $query->report->filters['id']->values = $ids;
                $roll();
            }
        } else {
            $roll();
        }

        return $result;
    }
}