<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "conversiontypename";
	public $property = "ConversionTypeName";
	public $is_filter = true;
	public $type = "string";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $incompatible = ["ActiveViewCpm","ActiveViewCtr","ActiveViewImpressions","ActiveViewMeasurability","ActiveViewMeasurableCost","ActiveViewMeasurableImpressions","ActiveViewViewability","AverageCost","AverageCpc","AverageCpe","AverageCpm","AverageCpv","AveragePageviews","AveragePosition","AverageTimeOnSite","BounceRate","ClickAssistedConversionValue","ClickAssistedConversions","ClickAssistedConversionsOverLastClickConversions","Clicks","ContentImpressionShare","ContentRankLostImpressionShare","Cost","Ctr","EngagementRate","Engagements","GmailForwards","GmailSaves","GmailSecondaryClicks","ImpressionAssistedConversionValue","ImpressionAssistedConversions","ImpressionAssistedConversionsOverLastClickConversions","Impressions","InteractionRate","InteractionTypes","Interactions","NumOfflineImpressions","NumOfflineInteractions","OfflineInteractionRate","PercentNewVisitors","RelativeCtr","SearchExactMatchImpressionShare","SearchImpressionShare","SearchRankLostImpressionShare","VideoQuartile100Rate","VideoQuartile25Rate","VideoQuartile50Rate","VideoQuartile75Rate","VideoViewRate","VideoViews"];
	public $platform = "adwords";
	public $raw_property = "ConversionTypeName";
};
