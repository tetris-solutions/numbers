<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $description = 'The total number of actions that people take involving your ads (or all posts, in some cases). Inline post engagements use a fixed 1-day-click attribution window.';

	public $id = 'inline_post_engagement';

	public $is_dimension = false;

	public $is_filter = true;

	public $is_metric = true;

	public $is_percentage = false;

	public $platform = 'facebook';

	public $property = 'inline_post_engagement';

	public $type = 'decimal';
};
