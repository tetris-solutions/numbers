<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_Parsable;

return new class extends Metric_FloatParser_Parsable {

	public $entity = 'AdSet';

	public $fields = [
	    "social_reach"
	];

	public $id = 'social_reach';

	public $metric = 'social_reach';

	public $platform = 'facebook';

	public $property = 'social_reach';

	public $report = 'FB_ADSET';

	public $type = 'decimal';
};
