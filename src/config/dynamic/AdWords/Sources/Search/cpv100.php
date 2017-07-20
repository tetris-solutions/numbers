<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserParsable;

return new class extends AdWordsSourceFloatParserParsable {
	public $id = "cpv100";
	public $metric = "cpv100";
	public $entity = "Search";
	public $platform = "adwords";
	public $report = "SEARCH_QUERY_PERFORMANCE_REPORT";
	public $property = "Cpv100";
	public $type = "currency";
	public $fields = ["Cost","VideoQuartile100Rate","VideoViews"];
	public $inferred_from = ["cost","videoquartile100rate","videoviews"];
};
