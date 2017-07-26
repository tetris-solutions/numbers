<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_Parsable;

return new class extends Metric_FloatParser_Parsable {

	public $entity = 'Ad';

	public $fields = [
	    "cpp"
	];

	public $id = 'cpp';

	public $metric = 'cpp';

	public $platform = 'facebook';

	public $property = 'cpp';

	public $report = 'FB_AD';

	public $type = 'currency';
};
