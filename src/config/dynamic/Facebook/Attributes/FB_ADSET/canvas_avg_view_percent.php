<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $description = 'The average percentage of the Facebook Canvas that people saw. Canvas is a screen that opens on mobile after a person clicks the Canvas link in your ad. It may include a series of interactive or multimedia components, including video, images, product catalogs and more.';

	public $id = 'canvas_avg_view_percent';

	public $is_dimension = false;

	public $is_filter = true;

	public $is_metric = true;

	public $is_percentage = false;

	public $platform = 'facebook';

	public $property = 'canvas_avg_view_percent';

	public $type = 'decimal';
};
