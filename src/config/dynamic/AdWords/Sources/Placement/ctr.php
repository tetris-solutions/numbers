<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_PercentParser_RatioSum_Parsable_Summable;

return new class extends Source_PercentParser_RatioSum_Parsable_Summable {
	public $id = "ctr";
	public $metric = "ctr";
	public $entity = "Placement";
	public $platform = "adwords";
	public $report = "AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT";
	public $fields = ["Ctr"];
	public $property = "Ctr";
	public $type = "percentage";
	public $dividendMetric = "clicks";
	public $divisorMetric = "impressions";
	public $inferred_from = ["clicks","impressions"];
};
