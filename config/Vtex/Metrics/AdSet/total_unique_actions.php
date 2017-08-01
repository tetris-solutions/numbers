<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'AdSet';

	public $fields = [
	    "total_unique_actions"
	];

	public $id = 'total_unique_actions';

	public $metric = 'total_unique_actions';

	public $platform = 'facebook';

	public $property = 'total_unique_actions';

	public $report = 'FB_ADSET';

	public $type = 'decimal';
};
