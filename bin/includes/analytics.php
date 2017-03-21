<?php

function getAnalyticsConfig(): array
{
    $output = [
        'entities' => [],
        'metrics' => [],
        'reports' => [],
        'sources' => []
    ];

    $dimensions = [
        ['name' => 'ga:date'],
        ['name' => 'ga:campaign'],
        ['name' => 'ga:source'],
        ['name' => 'ga:medium'],
        ['name' => 'ga:deviceCategory'],
        ['name' => 'ga:adcontent'],
        ['name' => 'ga:region']
    ];

    $metrics = [
        ['expression' => 'ga:newUsers'],
        ['expression' => 'ga:users'],
        ['expression' => 'ga:percentNewSessions'],
        ['expression' => 'ga:sessions'],
        ['expression' => 'ga:bounces'],
        ['expression' => 'ga:sessionDuration'],
        ['expression' => 'ga:goalCompletionsAll'],
        ['expression' => 'ga:goalConversionRateAll'],
        ['expression' => 'ga:goalStartsAll'],
        ['expression' => 'ga:pageviews'],
        ['expression' => 'ga:pageviewsPerSession'],
        ['expression' => 'ga:timeOnPage'],
        ['expression' => 'ga:totalEvents'],
        ['expression' => 'ga:uniqueEvents']
    ];

    foreach (['Completions', 'ConversionRate', 'Starts'] as $subGoal) {
        for ($i = 1; $i <= 10; $i++) {
            $metrics[] = ['expression' => "ga:goal{$i}{$subGoal}"];
        }
    }

    return $output;
}