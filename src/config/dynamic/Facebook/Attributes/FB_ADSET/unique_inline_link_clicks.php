<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $description = 'The number of people who performed an inline link click.';

	public $id = 'unique_inline_link_clicks';

	public $is_dimension = false;

	public $is_filter = true;

	public $is_metric = true;

	public $is_percentage = false;

	public $platform = 'facebook';

	public $property = 'unique_inline_link_clicks';

	public $type = 'decimal';
};
