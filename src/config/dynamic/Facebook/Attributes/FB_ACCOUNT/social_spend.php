<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $description = 'The total amount you\'ve spent so far for your ads showed with social information. (ex: Jane Doe likes this).';

	public $id = 'social_spend';

	public $is_dimension = false;

	public $is_filter = true;

	public $is_metric = true;

	public $is_percentage = false;

	public $platform = 'facebook';

	public $property = 'social_spend';

	public $type = 'currency';
};
