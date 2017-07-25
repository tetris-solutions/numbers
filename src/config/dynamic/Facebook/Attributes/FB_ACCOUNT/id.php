<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $description = 'The ID number of your ad account, which groups your advertising activity. Your ad account includes your campaigns, ads and billing.';

	public $id = 'id';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'facebook';

	public $property = 'account_id';

	public $type = 'numeric string';
};
