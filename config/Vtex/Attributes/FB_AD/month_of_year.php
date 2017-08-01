<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_FacebookMonthOfYearParser_Parsable;

return new class extends Attribute_FacebookMonthOfYearParser_Parsable {

	public $id = 'month_of_year';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'facebook';

	public $property = 'date_start';

	public $property_name = 'month_of_year';

	public $type = 'string';
};
