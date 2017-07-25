<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $description = 'The number of clicks (all) when your ad was displayed with social information, which shows other Facebook friends who engaged with your Facebook Page or ad.';

	public $id = 'social_clicks';

	public $is_dimension = false;

	public $is_filter = true;

	public $is_metric = true;

	public $is_percentage = false;

	public $platform = 'facebook';

	public $property = 'social_clicks';

	public $type = 'decimal';
};
