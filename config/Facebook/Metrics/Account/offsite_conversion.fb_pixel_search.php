<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'offsite_conversion.fb_pixel_search';

	public $entity = 'Account';

	public $fields = [
	    "actions"
	];

	public $id = 'offsite_conversion.fb_pixel_search';

	public $metric = 'offsite_conversion.fb_pixel_search';

	public $platform = 'facebook';

	public $property = 'offsite_conversion.fb_pixel_search';

	public $report = 'FB_ACCOUNT';

	public $type = 'decimal';
};
