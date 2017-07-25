<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $description = 'The unique ID of the ad set you\'re viewing in reporting. An ad set is a group of ads that share the same budget, schedule, delivery optimization and targeting.';

	public $id = 'adset_id';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'facebook';

	public $property = 'adset_id';

	public $type = 'numeric string';
};
