<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Attribute\Attribute_JSONParser_Parsable;

return new class extends Attribute_JSONParser_Parsable {

	public $id = 'creativefinalurls';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'CreativeFinalUrls';

	public $type = 'list';
};
