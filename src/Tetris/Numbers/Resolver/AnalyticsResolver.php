<?php

namespace Tetris\Numbers\Resolver;

use Tetris\Exceptions\SafeException;
use Tetris\Numbers\Report\Query\Query;
use Throwable;
use Google_Client;
use Google_Service_Analytics;
use Google_Service_AnalyticsReporting;
use Google_Service_AnalyticsReporting_ReportRequest;
use Google_Service_AnalyticsReporting_GetReportsRequest;
use Google_Service_AnalyticsReporting_Report;
use stdClass;

class AnalyticsResolver implements Resolver
{
    const WAIT_PERIOD = 500;
    private $tetrisAccount;
    private $client;
    private $analytics;
    private $reporting;

    function __construct(string $tetrisAccount, stdClass $token)
    {
        $this->client = new Google_Client();
        $this->tetrisAccount = $tetrisAccount;
        $this->client->setAuthConfig(__DIR__ . '/../../../../analytics-google-client.json');
        $this->client->setAccessToken((array)$token);

        $this->analytics = new Google_Service_Analytics($this->client);
        $this->reporting = new Google_Service_AnalyticsReporting($this->client);
    }

    function dispatchRequest(Query $query, bool $aggregateMode): array
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

        foreach ($query->report->metrics as $metric) {
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
        try {
            $report = $this->reporting->reports->batchGet($getRequest)[0];
        } catch (Throwable $e) {
            $errorInfo = json_decode($e->getMessage());

            $response = new stdClass();
            $response->code = $e->getCode();
            $response->body = $errorInfo->error;

            throw new SafeException($response, null, null, $e);
        }

        /**
         * @type stdClass $reportResponse
         */
        $reportResponse = $report->toSimpleObject();
        $rows = [];
        $data = (object)$reportResponse->data;
        $header = (object)$reportResponse->columnHeader;
        $metricHeader = (object)($header->metricHeader ?? []);

        foreach ($data->rows as $reportRow) {
            $reportRow = (object)$reportRow;
            $row = [];

            foreach ($reportRow->dimensions as $index => $dimensionResult) {
                $dimensionName = $header->dimensions[$index];
                $row[$dimensionName] = $dimensionResult;
            }

            $firstMetric = (object)($reportRow->metrics[0] ?? []);
            $values = !empty($firstMetric->values) ? $firstMetric->values : [];

            foreach ($values as $index => $metricResult) {
                $metricMetaData = (object)$metricHeader->metricHeaderEntries[$index];
                $row[$metricMetaData->name] = $metricResult;
            }

            $rows[] = $row;
        }

        return $rows;
    }

    function resolve(Query $query, bool $aggregateMode): array
    {
        global $predis;

        $lastCall = $predis->jsonget('analytics.last.call');

        while (microtime(true) - $lastCall >= self::WAIT_PERIOD) {
            usleep(100);
        }

        $predis->jsonset(microtime(true));

        return $this->dispatchRequest($query, $aggregateMode);
    }
}
