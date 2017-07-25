<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Ad';

	public $fields = [
	    "CurrentModelAttributedConversions"
	];

	public $id = 'currentmodelattributedconversions';

	public $metric = 'currentmodelattributedconversions';

	public $platform = 'adwords';

	public $property = 'CurrentModelAttributedConversions';

	public $report = 'AD_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
