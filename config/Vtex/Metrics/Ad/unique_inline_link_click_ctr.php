<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_Parsable;

return new class extends Metric_FloatParser_Parsable {

	public $entity = 'Ad';

	public $fields = [
	    "unique_inline_link_click_ctr"
	];

	public $id = 'unique_inline_link_click_ctr';

	public $metric = 'unique_inline_link_click_ctr';

	public $platform = 'facebook';

	public $property = 'unique_inline_link_click_ctr';

	public $report = 'FB_AD';

	public $type = 'decimal';
};
