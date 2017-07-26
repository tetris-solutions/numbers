<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'AdSet';

	public $fields = [
	    "total_actions"
	];

	public $id = 'total_actions';

	public $metric = 'total_actions';

	public $platform = 'facebook';

	public $property = 'total_actions';

	public $report = 'FB_ADSET';

	public $type = 'decimal';
};
