<?php

namespace Tetris\Numbers\Base\Parser;


use Tetris\Numbers\Report\Query\Query;

trait FacebookCPTotalActionsParser
{
    public $clicksProperty;
    public $spendProperty;

    function parse($source, Query $queryBase)
    {
        $spend = floatval(str_replace(',', '', $source->{$this->spendProperty}));

        $clicks = $source->{$this->clicksProperty};

        return !$clicks || $clicks==0 ? 0 : $spend / $clicks;
    }

    static function parserSpec(string $spend, string $clicks): array
    {
        return [
            'spendProperty' => $spend,
            'clicksProperty' => $clicks,
            'traits' => [
                'parser' => self::class
            ],
            'fields' => [$spend, $clicks]
        ];
    }
}