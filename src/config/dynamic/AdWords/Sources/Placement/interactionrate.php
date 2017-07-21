<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_PercentParser_RatioSum_Parsable_Summable;

return new class extends Source_PercentParser_RatioSum_Parsable_Summable {
	public $id = "interactionrate";
	public $metric = "interactionrate";
	public $entity = "Placement";
	public $platform = "adwords";
	public $report = "AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT";
	public $fields = ["InteractionRate"];
	public $property = "InteractionRate";
	public $type = "percentage";
	public $dividendMetric = "interactions";
	public $divisorMetric = "impressions";
	public $inferred_from = ["interactions","impressions"];
};
