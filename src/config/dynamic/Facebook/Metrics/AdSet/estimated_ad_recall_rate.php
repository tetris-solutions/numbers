<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_Parsable;

return new class extends Metric_FloatParser_Parsable {

	public $entity = 'AdSet';

	public $fields = [
	    "estimated_ad_recall_rate"
	];

	public $id = 'estimated_ad_recall_rate';

	public $metric = 'estimated_ad_recall_rate';

	public $platform = 'facebook';

	public $property = 'estimated_ad_recall_rate';

	public $report = 'FB_ADSET';

	public $type = 'decimal';
};
