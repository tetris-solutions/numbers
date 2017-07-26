<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'AdGroup';

	public $fields = [
	    "CurrentModelAttributedConversions"
	];

	public $id = 'currentmodelattributedconversions';

	public $metric = 'currentmodelattributedconversions';

	public $platform = 'adwords';

	public $property = 'CurrentModelAttributedConversions';

	public $report = 'ADGROUP_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
