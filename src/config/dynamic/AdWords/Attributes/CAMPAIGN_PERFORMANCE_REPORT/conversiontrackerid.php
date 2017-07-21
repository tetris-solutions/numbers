<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_IntegerParser;

return new class extends Attribute_IntegerParser {
	public $id = "conversiontrackerid";
	public $property = "ConversionTrackerId";
	public $is_filter = true;
	public $type = "integer";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $incompatible = ["ActiveViewCpm","ActiveViewCtr","ActiveViewImpressions","ActiveViewMeasurability","ActiveViewMeasurableCost","ActiveViewMeasurableImpressions","ActiveViewViewability","AverageCost","AverageCpc","AverageCpe","AverageCpm","AverageCpv","AverageFrequency","AveragePageviews","AveragePosition","AverageTimeOnSite","BounceRate","ClickAssistedConversionValue","ClickAssistedConversions","ClickAssistedConversionsOverLastClickConversions","Clicks","ContentBudgetLostImpressionShare","ContentImpressionShare","ContentRankLostImpressionShare","Cost","Ctr","EngagementRate","Engagements","GmailForwards","GmailSaves","GmailSecondaryClicks","ImpressionAssistedConversionValue","ImpressionAssistedConversions","ImpressionAssistedConversionsOverLastClickConversions","ImpressionReach","Impressions","InteractionRate","InteractionTypes","Interactions","InvalidClickRate","InvalidClicks","NumOfflineImpressions","NumOfflineInteractions","OfflineInteractionRate","PercentNewVisitors","RelativeCtr","SearchBudgetLostImpressionShare","SearchExactMatchImpressionShare","SearchImpressionShare","SearchRankLostImpressionShare","VideoQuartile100Rate","VideoQuartile25Rate","VideoQuartile50Rate","VideoQuartile75Rate","VideoViewRate","VideoViews"];
	public $platform = "adwords";
	public $raw_property = "ConversionTrackerId";
};
