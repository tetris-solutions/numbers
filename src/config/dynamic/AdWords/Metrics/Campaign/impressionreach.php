<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_ComplexValueParser_Parsable;

return new class extends Metric_ComplexValueParser_Parsable {

	public $entity = 'Campaign';

	public $fields = [
	    "ImpressionReach"
	];

	public $id = 'impressionreach';

	public $metric = 'impressionreach';

	public $platform = 'adwords';

	public $property = 'ImpressionReach';

	public $report = 'CAMPAIGN_PERFORMANCE_REPORT';

	public $type = 'special';
};
