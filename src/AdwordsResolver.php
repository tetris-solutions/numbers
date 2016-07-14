<?php
namespace Tetris\Numbers;

use Tetris\Adwords\Client;

class AdwordsResolver extends Client implements Resolver
{
    use EvalResolver;

    function resolve(Query $query): array
    {
        $rows = [];
        $this->SetClientCustomerId($query->adAccountId);
        $reports = $query->getReports();

        foreach ($reports as $reportName => $config) {
            $select = $this->select($config['fields'])
                ->from($reportName)
                ->during($query->since, $query->until);

            foreach ($config['filters'] as $filter => $value) {
                if (is_scalar($value)) {
                    $select->where($filter, $value);
                } else {
                    $select->where($filter, $value, 'IN');
                }
            }

            // @todo more than one row;

            $rows[] = self::evalMetric($select->fetchOne(), $config);
        }

        return $rows;
    }
}