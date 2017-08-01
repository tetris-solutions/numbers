<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'offsite_conversion.key_page_view';

	public $entity = 'AdSet';

	public $fields = [
	    "actions"
	];

	public $id = 'offsite_conversion.key_page_view';

	public $metric = 'offsite_conversion.key_page_view';

	public $platform = 'facebook';

	public $property = 'offsite_conversion.key_page_view';

	public $report = 'FB_ADSET';

	public $type = 'decimal';
};
