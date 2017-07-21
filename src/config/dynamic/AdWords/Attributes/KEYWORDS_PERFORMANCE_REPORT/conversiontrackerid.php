<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_IntegerParser;

return new class extends Attribute_IntegerParser {

	public $id = 'conversiontrackerid';

	public $incompatible = [
	    "ActiveViewCpm",
	    "ActiveViewCtr",
	    "ActiveViewImpressions",
	    "ActiveViewMeasurability",
	    "ActiveViewMeasurableCost",
	    "ActiveViewMeasurableImpressions",
	    "ActiveViewViewability",
	    "AverageCost",
	    "AverageCpc",
	    "AverageCpe",
	    "AverageCpm",
	    "AverageCpv",
	    "AveragePageviews",
	    "AveragePosition",
	    "AverageTimeOnSite",
	    "BounceRate",
	    "ClickAssistedConversionValue",
	    "ClickAssistedConversions",
	    "ClickAssistedConversionsOverLastClickConversions",
	    "Clicks",
	    "Cost",
	    "Ctr",
	    "EngagementRate",
	    "Engagements",
	    "GmailForwards",
	    "GmailSaves",
	    "GmailSecondaryClicks",
	    "HistoricalCreativeQualityScore",
	    "HistoricalLandingPageQualityScore",
	    "HistoricalQualityScore",
	    "HistoricalSearchPredictedCtr",
	    "ImpressionAssistedConversionValue",
	    "ImpressionAssistedConversions",
	    "ImpressionAssistedConversionsOverLastClickConversions",
	    "Impressions",
	    "InteractionRate",
	    "InteractionTypes",
	    "Interactions",
	    "PercentNewVisitors",
	    "SearchExactMatchImpressionShare",
	    "SearchImpressionShare",
	    "SearchRankLostImpressionShare",
	    "VideoQuartile100Rate",
	    "VideoQuartile25Rate",
	    "VideoQuartile50Rate",
	    "VideoQuartile75Rate",
	    "VideoViewRate",
	    "VideoViews"
	];

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'ConversionTrackerId';

	public $type = 'integer';
};
