<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'rsvp';

	public $entity = 'AdSet';

	public $fields = [
	    "actions"
	];

	public $id = 'rsvp';

	public $metric = 'rsvp';

	public $platform = 'facebook';

	public $property = 'rsvp';

	public $report = 'FB_ADSET';

	public $type = 'decimal';
};
