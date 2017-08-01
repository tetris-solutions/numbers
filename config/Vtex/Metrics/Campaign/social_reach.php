<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_Parsable;

return new class extends Metric_FloatParser_Parsable {

	public $entity = 'Campaign';

	public $fields = [
	    "social_reach"
	];

	public $id = 'social_reach';

	public $metric = 'social_reach';

	public $platform = 'facebook';

	public $property = 'social_reach';

	public $report = 'FB_CAMPAIGN';

	public $type = 'decimal';
};
