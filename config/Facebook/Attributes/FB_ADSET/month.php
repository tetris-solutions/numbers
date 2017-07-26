<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Attribute\Attribute_FacebookMonthParser_Parsable;

return new class extends Attribute_FacebookMonthParser_Parsable {

	public $id = 'month';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'facebook';

	public $property = 'date_start';

	public $property_name = 'month';

	public $type = 'string';
};
