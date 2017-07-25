<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_Parsable;

return new class extends Metric_FloatParser_Parsable {

	public $entity = 'AdSet';

	public $fields = [
	    "unique_link_clicks_ctr"
	];

	public $id = 'unique_link_clicks_ctr';

	public $metric = 'unique_link_clicks_ctr';

	public $platform = 'facebook';

	public $property = 'unique_link_clicks_ctr';

	public $report = 'FB_ADSET';

	public $type = 'decimal';
};
