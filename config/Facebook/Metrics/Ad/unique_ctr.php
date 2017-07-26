<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_Parsable;

return new class extends Metric_FloatParser_Parsable {

	public $entity = 'Ad';

	public $fields = [
	    "unique_ctr"
	];

	public $id = 'unique_ctr';

	public $metric = 'unique_ctr';

	public $platform = 'facebook';

	public $property = 'unique_ctr';

	public $report = 'FB_AD';

	public $type = 'decimal';
};
