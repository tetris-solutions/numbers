<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourcePercentParserParsable;

return new class extends AdWordsSourcePercentParserParsable {
	public $id = "videoquartile25rate";
	public $metric = "videoquartile25rate";
	public $entity = "Ad";
	public $platform = "adwords";
	public $report = "AD_PERFORMANCE_REPORT";
	public $fields = ["VideoQuartile25Rate"];
	public $property = "VideoQuartile25Rate";
	public $type = "percentage";
	public $inferred_from = ["videoviews"];
};
