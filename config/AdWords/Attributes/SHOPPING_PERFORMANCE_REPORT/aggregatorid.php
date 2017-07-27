<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_IntegerParser_Parsable;

return new class extends Attribute_IntegerParser_Parsable {

	public $id = 'aggregatorid';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'AggregatorId';

	public $type = 'integer';
};
