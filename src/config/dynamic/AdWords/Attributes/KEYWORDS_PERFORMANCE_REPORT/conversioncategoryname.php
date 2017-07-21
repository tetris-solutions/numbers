<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "conversioncategoryname";
	public $property = "ConversionCategoryName";
	public $is_filter = true;
	public $type = "string";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $incompatible = ["ActiveViewCpm","ActiveViewCtr","ActiveViewImpressions","ActiveViewMeasurability","ActiveViewMeasurableCost","ActiveViewMeasurableImpressions","ActiveViewViewability","AverageCost","AverageCpc","AverageCpe","AverageCpm","AverageCpv","AveragePageviews","AveragePosition","AverageTimeOnSite","BounceRate","ClickAssistedConversionValue","ClickAssistedConversions","ClickAssistedConversionsOverLastClickConversions","Clicks","Cost","Ctr","EngagementRate","Engagements","GmailForwards","GmailSaves","GmailSecondaryClicks","HistoricalCreativeQualityScore","HistoricalLandingPageQualityScore","HistoricalQualityScore","HistoricalSearchPredictedCtr","ImpressionAssistedConversionValue","ImpressionAssistedConversions","ImpressionAssistedConversionsOverLastClickConversions","Impressions","InteractionRate","InteractionTypes","Interactions","PercentNewVisitors","SearchExactMatchImpressionShare","SearchImpressionShare","SearchRankLostImpressionShare","VideoQuartile100Rate","VideoQuartile25Rate","VideoQuartile50Rate","VideoQuartile75Rate","VideoViewRate","VideoViews"];
	public $platform = "adwords";
	public $raw_property = "ConversionCategoryName";
};
