<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $group = 'Attribute';

	public $id = 'mobilebidmodifier';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = true;

	public $platform = 'adwords';

	public $property = 'CampaignMobileBidModifier';

	public $type = 'percentage';
};
