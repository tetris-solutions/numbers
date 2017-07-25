<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Source_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Audience';

	public $fields = [
	    "GmailSaves"
	];

	public $id = 'gmailsaves';

	public $metric = 'gmailsaves';

	public $platform = 'adwords';

	public $property = 'GmailSaves';

	public $report = 'AUDIENCE_PERFORMANCE_REPORT';

	public $type = 'integer';
};
