<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Ad';

	public $fields = [
	    "unique_inline_link_clicks"
	];

	public $id = 'unique_inline_link_clicks';

	public $metric = 'unique_inline_link_clicks';

	public $platform = 'facebook';

	public $property = 'unique_inline_link_clicks';

	public $report = 'FB_AD';

	public $type = 'decimal';
};
