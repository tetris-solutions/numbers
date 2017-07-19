<?php

namespace Tetris\Numbers;

class AdWordsSpecialMetric implements Extension
{
    use ExtensionApply;

    const metrics = [
        'SearchImpressionShare' => [
            'SearchBudgetLostImpressionShare',
            'SearchRankLostImpressionShare'
        ],

        'SearchBudgetLostImpressionShare' => [
            'SearchRankLostImpressionShare',
            'SearchImpressionShare'
        ],

        'SearchRankLostImpressionShare' => [
            'SearchBudgetLostImpressionShare',
            'SearchImpressionShare'
        ],

        'ContentImpressionShare' => [
            'ContentBudgetLostImpressionShare',
            'ContentRankLostImpressionShare'
        ],

        'ContentBudgetLostImpressionShare' => [
            'ContentRankLostImpressionShare',
            'ContentImpressionShare'
        ],
        'ContentRankLostImpressionShare' => [
            'ContentBudgetLostImpressionShare',
            'ContentImpressionShare'
        ]
    ];

    function __construct(array $fields)
    {
        $fixed = [
            'roas' => customRatioParser('ConversionValue', 'Cost'),
            'cpv100' => cpv100Adwords('Cost', 'VideoQuartile100Rate', 'VideoViews')
        ];

        $this->map = array_merge($fixed, $this->build($fields, self::metrics));
    }

    private static function build(array $fields, array $list): array
    {
        $config = [];

        foreach ($list as $name => $parts) {
            if (!isset($fields[$name])) continue;

            $auxMetrics = [];

            foreach ($parts as $part) {
                if (!isset($fields[$part])) continue;

                $auxMetrics[] = $part;
            }

            $config[strtolower($name)] = specialValueTriangulation($name, $auxMetrics);
        }

        return $config;
    }
}