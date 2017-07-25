<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $id = 'adformat';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'AdFormat';

	public $type = 'adformat';

	public $values = [
	    "UNKNOWN" => "unknown",
	    "TEXT" => "text",
	    "IMAGE" => "image",
	    "DYNAMIC_IMAGE" => "dynamic_image",
	    "FLASH" => "flash",
	    "VIDEO" => "video",
	    "HTML" => "html",
	    "AUDIO" => "audio",
	    "COMPOSITE" => "composite",
	    "PRINT" => "print"
	];
};
