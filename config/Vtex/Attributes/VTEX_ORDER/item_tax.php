<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $id = 'item_tax';

	public $is_dimension = false;

	public $is_filter = false;

	public $is_metric = true;

	public $is_percentage = false;

	public $platform = 'vtex';

	public $property = 'item_tax';

	public $type = 'integer';
};
