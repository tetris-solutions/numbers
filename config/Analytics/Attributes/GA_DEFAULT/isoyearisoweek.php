<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Attribute\Attribute_AnalyticsWeekParser_Parsable;

return new class extends Attribute_AnalyticsWeekParser_Parsable {

	public $id = 'isoyearisoweek';

	public $is_dimension = true;

	public $is_filter = false;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'analytics';

	public $property = 'ga:isoYearIsoWeek';

	public $type = 'string';
};
