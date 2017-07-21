<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Source_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'AdGroup';

	public $fields = [
	    "VideoViews"
	];

	public $id = 'videoviews';

	public $metric = 'videoviews';

	public $platform = 'adwords';

	public $property = 'VideoViews';

	public $report = 'ADGROUP_PERFORMANCE_REPORT';

	public $type = 'integer';
};
