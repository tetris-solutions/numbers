<?php

namespace Tetris\Numbers;


class AdWordsInferredSum implements Extension
{
    use ExtensionApply;

    function __construct()
    {
        $this->map = [
            'searchbudgetlostimpressionshare' => lostImpressionShareSum('searchbudgetlostimpressionshare', 'searchimpressionshare'),
            'searchranklostimpressionshare' => lostImpressionShareSum('searchranklostimpressionshare', 'searchimpressionshare'),
            'searchimpressionshare' => impressionShareSum('searchimpressionshare'),

            'contentbudgetlostimpressionshare' => lostImpressionShareSum('contentbudgetlostimpressionshare', 'contentimpressionshare'),
            'contentranklostimpressionshare' => lostImpressionShareSum('contentranklostimpressionshare', 'contentimpressionshare'),
            'contentimpressionshare' => impressionShareSum('contentimpressionshare'),

            'allconversionrate' => customRatioSum('allconversions', 'clicks'),
            'averagecost' => customRatioSum('cost', 'interactions'),
            'averagecpc' => customRatioSum('cost', 'clicks'),
            'averagecpe' => customRatioSum('cost', 'engagements'),
            'averagecpm' => customRatioSum('cost', 'impressions'),
            'averagecpv' => customRatioSum('cost', 'videoviews'),
            'averagefrequency' => customRatioSum('impressions', 'impressionreach'),
            'conversionrate' => customRatioSum('conversions', 'clicks'),
            'costperallconversion' => customRatioSum('cost', 'allconversions'),
            'costperconversion' => customRatioSum('cost', 'conversions'),
            'ctr' => customRatioSum('clicks', 'impressions'),
            'engagementrate' => customRatioSum('engagements', 'impressions'),
            'interactionrate' => customRatioSum('interactions', 'impressions'),
            'invalidclickrate' => customRatioSum('invalidclicks', 'clicks'),
            'offlineinteractionrate' => customRatioSum('numofflineinteractions', 'numofflineimpressions'),
            'valueperallconversion' => customRatioSum('allconversionvalue', 'allconversions'),
            'valueperconversion' => customRatioSum('conversionvalue', 'conversions'),
            'videoviewrate' => customRatioSum('videoviews', 'impressions'),

            'videoquartile25rate' => videoQuartileSum(25),
            'videoquartile50rate' => videoQuartileSum(50),
            'videoquartile75rate' => videoQuartileSum(75),
            'videoquartile100rate' => videoQuartileSum(100),

            'averageposition' => weightedAverage('averageposition', 'impressions'),
            'averagequalityscore' => weightedAverage('averagequalityscore', 'impressions'),
            'roas' => customRatioSum('conversionvalue', 'cost'),
            'cpv100' => cpv100AdwordsSum('cost', 'videoquartile100rate', 'videoviews')
        ];
    }
}
