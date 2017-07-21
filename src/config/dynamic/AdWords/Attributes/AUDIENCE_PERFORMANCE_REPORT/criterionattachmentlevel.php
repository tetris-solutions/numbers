<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "criterionattachmentlevel";
	public $property = "CriterionAttachmentLevel";
	public $is_filter = true;
	public $type = "entitycriterionattachmentlevel";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"UNKNOWN":"Unknown","ADGROUP":"Ad group","CAMPAIGN":"Campaign","CUSTOMER":"Customer"};
	public $platform = "adwords";
	public $raw_property = "CriterionAttachmentLevel";
};
