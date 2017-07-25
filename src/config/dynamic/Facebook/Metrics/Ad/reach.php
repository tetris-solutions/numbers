<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_Parsable;

return new class extends Metric_FloatParser_Parsable {

	public $entity = 'Ad';

	public $fields = [
	    "reach"
	];

	public $id = 'reach';

	public $metric = 'reach';

	public $platform = 'facebook';

	public $property = 'reach';

	public $report = 'FB_AD';

	public $type = 'decimal';
};
