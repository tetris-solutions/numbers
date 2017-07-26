<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Ad';

	public $fields = [
	    "inline_link_clicks"
	];

	public $id = 'inline_link_clicks';

	public $metric = 'inline_link_clicks';

	public $platform = 'facebook';

	public $property = 'inline_link_clicks';

	public $report = 'FB_AD';

	public $type = 'decimal';
};
