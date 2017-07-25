<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $description = 'The start date for your data. This is controlled by the date range you\'ve selected for your reporting view.';

	public $id = 'week';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'facebook';

	public $property = 'date_start';

	public $property_name = 'week';

	public $type = 'string';
};
