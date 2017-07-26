<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'leadgen.other';

	public $entity = 'AdSet';

	public $fields = [
	    "actions"
	];

	public $id = 'leadgen.other';

	public $metric = 'leadgen.other';

	public $platform = 'facebook';

	public $property = 'leadgen.other';

	public $report = 'FB_ADSET';

	public $type = 'decimal';
};
