<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Account';

	public $fields = [
	    "estimated_ad_recallers"
	];

	public $id = 'estimated_ad_recallers';

	public $metric = 'estimated_ad_recallers';

	public $platform = 'facebook';

	public $property = 'estimated_ad_recallers';

	public $report = 'FB_ACCOUNT';

	public $type = 'decimal';
};
