<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_AnalyticsYearMonthParser_Parsable;

return new class extends Attribute_AnalyticsYearMonthParser_Parsable {

	public $id = 'yearmonth';

	public $is_dimension = true;

	public $is_filter = false;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'analytics';

	public $property = 'ga:yearMonth';

	public $type = 'string';
};
