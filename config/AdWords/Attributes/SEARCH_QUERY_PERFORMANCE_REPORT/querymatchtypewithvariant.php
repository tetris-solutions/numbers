<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $group = 'Segment';

	public $id = 'querymatchtypewithvariant';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'QueryMatchTypeWithVariant';

	public $type = 'querymatchtypewithvariant';

	public $values = [
	    "AUTO" => "auto",
	    "BROAD" => "broad",
	    "EXACT" => "exact",
	    "EXPANDED" => "broad",
	    "PHRASE" => "phrase",
	    "NEAR_EXACT" => "exact (close variant)",
	    "NEAR_PHRASE" => "phrase (close variant)"
	];
};
