<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_ComplexValueParser_Parsable;

return new class extends Source_ComplexValueParser_Parsable {
	public $id = "searchexactmatchimpressionshare";
	public $metric = "searchexactmatchimpressionshare";
	public $entity = "Account";
	public $platform = "adwords";
	public $report = "ACCOUNT_PERFORMANCE_REPORT";
	public $fields = ["SearchExactMatchImpressionShare"];
	public $property = "SearchExactMatchImpressionShare";
	public $type = "special";
};
