<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $description = 'An estimate of the number of additional people who may remember seeing your ads, if asked, within 2 days. This metric shows results for ads using brand awareness, video views and Page post engagement objectives.';

	public $id = 'estimated_ad_recallers';

	public $is_dimension = false;

	public $is_filter = true;

	public $is_metric = true;

	public $is_percentage = false;

	public $platform = 'facebook';

	public $property = 'estimated_ad_recallers';

	public $type = 'decimal';
};
