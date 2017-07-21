<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_PercentParser_Parsable;

return new class extends Source_PercentParser_Parsable {

	public $entity = 'Campaign';

	public $fields = [
	    "PercentNewVisitors"
	];

	public $id = 'percentnewvisitors';

	public $metric = 'percentnewvisitors';

	public $platform = 'adwords';

	public $property = 'PercentNewVisitors';

	public $report = 'CAMPAIGN_PERFORMANCE_REPORT';

	public $type = 'percentage';
};
