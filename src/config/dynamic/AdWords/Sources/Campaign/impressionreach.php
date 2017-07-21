<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_ComplexValueParser_Parsable;

return new class extends Source_ComplexValueParser_Parsable {
	public $id = "impressionreach";
	public $metric = "impressionreach";
	public $entity = "Campaign";
	public $platform = "adwords";
	public $report = "CAMPAIGN_PERFORMANCE_REPORT";
	public $fields = ["ImpressionReach"];
	public $property = "ImpressionReach";
	public $type = "special";
};
