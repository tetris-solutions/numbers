<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Source_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Campaign';

	public $fields = [
	    "GmailSecondaryClicks"
	];

	public $id = 'gmailsecondaryclicks';

	public $metric = 'gmailsecondaryclicks';

	public $platform = 'adwords';

	public $property = 'GmailSecondaryClicks';

	public $report = 'CAMPAIGN_PERFORMANCE_REPORT';

	public $type = 'integer';
};
