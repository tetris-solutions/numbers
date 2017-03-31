<?php

namespace Tetris\Numbers;

use Google_Client;
use Google_Service_Analytics;
use Google_Service_AnalyticsReporting;
use Google_Service_AnalyticsReporting_ReportRequest;
use Google_Service_AnalyticsReporting_GetReportsRequest;
use Google_Service_AnalyticsReporting_Report;
use stdClass;

class AnalyticsResolver implements Resolver
{
    private $tetrisAccount;
    private $client;
    private $analytics;
    private $reporting;

    function __construct(string $tetrisAccount, stdClass $token)
    {
        $this->client = new Google_Client();
        $this->tetrisAccount = $tetrisAccount;
        $this->client->setAuthConfig(__DIR__ . '/../../analytics-google-client.json');
        $this->client->setAccessToken((array)$token);

        $this->analytics = new Google_Service_Analytics($this->client);
        $this->reporting = new Google_Service_AnalyticsReporting($this->client);
    }

    function resolve(Query $query, bool $aggregateMode): array
    {
        $reportRequest = new Google_Service_AnalyticsReporting_ReportRequest();
        $reportRequest->setSamplingLevel('LARGE');
        $reportRequest->setViewId($query->gaViewId);
        $reportRequest->setDateRanges([
            'startDate' => $query->since->format('Y-m-d'),
            'endDate' => $query->until->format('Y-m-d')
        ]);

        $metrics = [];
        $dimensions = [];

        foreach ($query->metrics as $metric) {
            foreach ($metric['fields'] as $field) {
                $metrics[] = ['expression' => $field];
            }
        }

        foreach ($query->report->dimensions as $dimension) {
            $dimensions[] = ['name' => $dimension['property']];
        }

        $reportRequest->setDimensions($dimensions);
        $reportRequest->setMetrics($metrics);

        $getRequest = new Google_Service_AnalyticsReporting_GetReportsRequest();
        $getRequest->setReportRequests([$reportRequest]);

        /**
         * @type Google_Service_AnalyticsReporting_Report $report
         */
        $report = $this->reporting->reports->batchGet($getRequest)[0];
        /**
         * @type
         */
        $reportResponse = $report->toSimpleObject();
        $rows = [];

        /**
         * @type array $reportRow
         */
        foreach ($reportResponse->data['rows'] as $reportRow) {
            $row = [];

            foreach ($reportRow['dimensions'] as $index => $dimensioResult) {
                $dimensionName = $reportResponse->columnHeader['dimensions'][$index];
                $row[$dimensionName] = $dimensioResult;
            }

            foreach ($reportRow['metrics'] as $index => $metricResult) {
                $metricMetaData = $reportResponse->columnHeader['metricHeader']['metricHeaderEntries'][$index];
                $row[$metricMetaData['name']] = $metricResult['values'][0];
            }

            $rows[] = $row;
        }

//        exit(json_encode($rows));

        return $rows;
    }
}
