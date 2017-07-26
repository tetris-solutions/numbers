<?php

namespace Tetris\Numbers\Generator\AdWords\Extensions;

use Tetris\Numbers\Base\Parser\AdWordsCPV100Parser;
use Tetris\Numbers\Base\Parser\RatioParser;
use Tetris\Numbers\Base\Parser\TriangulationParser;
use Tetris\Numbers\Generator\Shared\Extension;
use Tetris\Numbers\Generator\Shared\ExtensionApply;

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
            'roas' => RatioParser::parserSpec('ConversionValue', 'Cost'),
            'cpv100' => AdWordsCPV100Parser::parserSpec('Cost', 'VideoQuartile100Rate', 'VideoViews')
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

            $config[strtolower($name)] = TriangulationParser::parserSpec($name, $auxMetrics);
        }

        return $config;
    }
}