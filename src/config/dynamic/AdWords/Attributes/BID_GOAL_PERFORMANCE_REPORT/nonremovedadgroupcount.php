<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {

	public $id = 'nonremovedadgroupcount';

	public $is_dimension = false;

	public $is_filter = false;

	public $is_metric = true;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'NonRemovedAdGroupCount';

	public $type = 'integer';
};
