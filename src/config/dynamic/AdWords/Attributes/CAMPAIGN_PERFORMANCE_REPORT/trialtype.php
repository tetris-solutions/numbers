<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "trialtype";
	public $property = "CampaignTrialType";
	public $is_filter = true;
	public $type = "campaigntrialtype";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"UNKNOWN":"unknown","BASE":"base campaign","DRAFT":"draft campaign","TRIAL":"trial campaign"};
	public $platform = "adwords";
	public $raw_property = "CampaignTrialType";
};
