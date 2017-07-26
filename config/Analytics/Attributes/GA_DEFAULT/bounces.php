<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $id = 'bounces';

	public $is_dimension = false;

	public $is_filter = false;

	public $is_metric = true;

	public $is_percentage = false;

	public $platform = 'analytics';

	public $property = 'ga:bounces';

	public $type = 'integer';
};
