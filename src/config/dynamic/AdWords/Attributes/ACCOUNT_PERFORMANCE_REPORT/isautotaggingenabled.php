<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $id = 'isautotaggingenabled';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'IsAutoTaggingEnabled';

	public $type = 'enum';

	public $values = [
	    "TRUE" => "true",
	    "FALSE" => "false"
	];
};
