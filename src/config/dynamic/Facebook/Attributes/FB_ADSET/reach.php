<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $description = 'The number of people who saw your ads at least once. Reach is different from impressions, which may include multiple views of your ads by the same people.';

	public $id = 'reach';

	public $is_dimension = false;

	public $is_filter = true;

	public $is_metric = true;

	public $is_percentage = false;

	public $platform = 'facebook';

	public $property = 'reach';

	public $type = 'decimal';
};
