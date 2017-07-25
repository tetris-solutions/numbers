<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_Parsable;

return new class extends Metric_FloatParser_Parsable {

	public $entity = 'Account';

	public $fields = [
	    "cpp"
	];

	public $id = 'cpp';

	public $metric = 'cpp';

	public $platform = 'facebook';

	public $property = 'cpp';

	public $report = 'FB_ACCOUNT';

	public $type = 'currency';
};
