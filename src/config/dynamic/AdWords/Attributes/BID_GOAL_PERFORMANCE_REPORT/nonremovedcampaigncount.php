<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "nonremovedcampaigncount";
	public $property = "NonRemovedCampaignCount";
	public $is_filter = false;
	public $type = "integer";
	public $is_metric = true;
	public $is_dimension = false;
	public $is_percentage = false;
	public $platform = "adwords";
	public $raw_property = "NonRemovedCampaignCount";
};
