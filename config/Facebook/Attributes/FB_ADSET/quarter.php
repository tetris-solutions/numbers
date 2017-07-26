<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Attribute\Attribute_FacebookQuarterParser_Parsable;

return new class extends Attribute_FacebookQuarterParser_Parsable {

	public $id = 'quarter';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'facebook';

	public $property = 'date_start';

	public $property_name = 'quarter';

	public $type = 'string';
};
