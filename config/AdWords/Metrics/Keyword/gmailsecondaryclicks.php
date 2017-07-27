<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Keyword';

	public $fields = [
	    "GmailSecondaryClicks"
	];

	public $id = 'gmailsecondaryclicks';

	public $metric = 'gmailsecondaryclicks';

	public $platform = 'adwords';

	public $property = 'GmailSecondaryClicks';

	public $report = 'KEYWORDS_PERFORMANCE_REPORT';

	public $type = 'integer';
};
