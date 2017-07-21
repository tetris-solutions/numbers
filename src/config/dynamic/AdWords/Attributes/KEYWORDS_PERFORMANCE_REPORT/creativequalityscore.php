<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "creativequalityscore";
	public $property = "CreativeQualityScore";
	public $is_filter = true;
	public $type = "qualityscorebucket";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"UNKNOWN":"--","BELOW_AVERAGE":"Below average","AVERAGE":"Average","ABOVE_AVERAGE":"Above average"};
	public $platform = "adwords";
	public $raw_property = "CreativeQualityScore";
};
