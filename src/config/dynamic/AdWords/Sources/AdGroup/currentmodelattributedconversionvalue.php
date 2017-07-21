<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Source_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'AdGroup';

	public $fields = [
	    "CurrentModelAttributedConversionValue"
	];

	public $id = 'currentmodelattributedconversionvalue';

	public $metric = 'currentmodelattributedconversionvalue';

	public $platform = 'adwords';

	public $property = 'CurrentModelAttributedConversionValue';

	public $report = 'ADGROUP_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
