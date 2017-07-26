<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_Parsable;

return new class extends Metric_FloatParser_Parsable {

	public $entity = 'Campaign';

	public $fields = [
	    "reach"
	];

	public $id = 'reach';

	public $metric = 'reach';

	public $platform = 'facebook';

	public $property = 'reach';

	public $report = 'FB_CAMPAIGN';

	public $type = 'decimal';
};
