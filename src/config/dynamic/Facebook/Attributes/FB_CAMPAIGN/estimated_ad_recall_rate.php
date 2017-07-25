<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $description = 'The rate at which an estimated number of additional people, when asked, would remember seeing your ads within 2 days.';

	public $id = 'estimated_ad_recall_rate';

	public $is_dimension = false;

	public $is_filter = true;

	public $is_metric = true;

	public $is_percentage = false;

	public $platform = 'facebook';

	public $property = 'estimated_ad_recall_rate';

	public $type = 'decimal';
};
