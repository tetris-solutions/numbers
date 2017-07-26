<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'AdSet';

	public $fields = [
	    "unique_inline_link_clicks"
	];

	public $id = 'unique_inline_link_clicks';

	public $metric = 'unique_inline_link_clicks';

	public $platform = 'facebook';

	public $property = 'unique_inline_link_clicks';

	public $report = 'FB_ADSET';

	public $type = 'decimal';
};
