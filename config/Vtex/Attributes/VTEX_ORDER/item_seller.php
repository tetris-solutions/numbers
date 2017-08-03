<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $group = 'list';

	public $id = 'item_seller';

	public $is_dimension = true;

	public $is_filter = false;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'vtex';

	public $property = 'item_seller';

	public $type = 'string';
};
