<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_Parsable;

return new class extends Metric_FloatParser_Parsable {

	public $entity = 'Audience';

	public $fields = [
	    "CpmBid"
	];

	public $id = 'cpmbid';

	public $metric = 'cpmbid';

	public $platform = 'adwords';

	public $property = 'CpmBid';

	public $report = 'AUDIENCE_PERFORMANCE_REPORT';

	public $type = 'currency';
};
