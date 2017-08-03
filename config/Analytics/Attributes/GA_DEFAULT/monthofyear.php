<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_AnalyticsMonthOfYearParser_Parsable;

return new class extends Attribute_AnalyticsMonthOfYearParser_Parsable {

	public $group = 'DIMENSION';

	public $id = 'monthofyear';

	public $is_dimension = true;

	public $is_filter = false;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'analytics';

	public $property = 'ga:month';

	public $type = 'string';
};
