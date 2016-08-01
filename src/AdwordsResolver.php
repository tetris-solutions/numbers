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
//            $useAccountPerformanceInstead = $reportName === 'CAMPAIGN_PERFORMANCE_REPORT' &&
//                !isset($config['fields']['CampaignId']);
//
//            if ($useAccountPerformanceInstead) {
//                $reportName = 'ACCOUNT_PERFORMANCE_REPORT';
//            }

            $select = $this->select($config['fields'])
                ->from($reportName)
                ->during($query->since, $query->until);

            foreach ($config['filters'] as $filter => $value) {
                if (is_array($value)) {
                    $select->where($filter, $value, 'IN');
                } else {
                    $select->where($filter, $value);
                }
            }

            $ls = $select->fetchAll();

            foreach ($ls as $line) {
                $rows[] = parseMetrics($line, $config);
            }
        }

        return $rows;
    }
}