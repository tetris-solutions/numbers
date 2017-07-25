<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Source_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Ad';

	public $fields = [
	    "GmailForwards"
	];

	public $id = 'gmailforwards';

	public $metric = 'gmailforwards';

	public $platform = 'adwords';

	public $property = 'GmailForwards';

	public $report = 'AD_PERFORMANCE_REPORT';

	public $type = 'integer';
};
