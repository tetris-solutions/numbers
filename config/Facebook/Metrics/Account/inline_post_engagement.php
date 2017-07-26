<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Account';

	public $fields = [
	    "inline_post_engagement"
	];

	public $id = 'inline_post_engagement';

	public $metric = 'inline_post_engagement';

	public $platform = 'facebook';

	public $property = 'inline_post_engagement';

	public $report = 'FB_ACCOUNT';

	public $type = 'decimal';
};
