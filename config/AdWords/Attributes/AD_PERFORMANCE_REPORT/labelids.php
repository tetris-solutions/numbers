<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_JSONParser_Parsable;

return new class extends Attribute_JSONParser_Parsable {

	public $group = 'Attribute';

	public $id = 'labelids';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'LabelIds';

	public $type = 'list';
};
