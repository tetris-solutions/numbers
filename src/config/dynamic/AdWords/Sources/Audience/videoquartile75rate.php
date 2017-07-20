<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourcePercentParserParsable;

return new class extends AdWordsSourcePercentParserParsable {
	public $id = "videoquartile75rate";
	public $metric = "videoquartile75rate";
	public $entity = "Audience";
	public $platform = "adwords";
	public $report = "AUDIENCE_PERFORMANCE_REPORT";
	public $fields = ["VideoQuartile75Rate"];
	public $property = "VideoQuartile75Rate";
	public $type = "percentage";
	public $inferred_from = ["videoviews"];
};
