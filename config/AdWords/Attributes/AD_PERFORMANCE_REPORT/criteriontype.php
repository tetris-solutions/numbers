<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $group = 'Attribute';

	public $id = 'criteriontype';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'CriterionType';

	public $type = 'apicriteriontype';

	public $values = [
	    "UNKNOWN" => "unknown",
	    "AD_SCHEDULE" => "Ad Schedule",
	    "AGE_RANGE" => "Age",
	    "APP_PAYMENT_MODEL" => "App Payment Model",
	    "CARRIER" => "Carrier",
	    "CONTENT_LABEL" => "Content Label",
	    "CUSTOM_AFFINITY" => "Custom Affinity",
	    "GENDER" => "Gender",
	    "LOCATION_GROUPS" => "Location Groups",
	    "IP_BLOCK" => "IP Block",
	    "KEYWORD" => "Keyword",
	    "LANGUAGE" => "Language",
	    "LOCATION" => "Location",
	    "MOBILE_APPLICATION" => "Mobile Application",
	    "MOBILE_APP_CATEGORY" => "Mobile App Category",
	    "MOBILE_DEVICE" => "Mobile Device",
	    "OPERATING_SYSTEM_VERSION" => "Operating System Version",
	    "PARENT" => "Parental status",
	    "PLACEMENT" => "Placement",
	    "PLATFORM" => "Platform",
	    "PREFERRED_CONTENT" => "Preferred Content",
	    "PRODUCT_PARTITION" => "Product Partition",
	    "PRODUCT_SCOPE" => "Product Scope",
	    "PROXIMITY" => "Proximity",
	    "USER_INTEREST" => "User Interest",
	    "USER_LIST" => "User List",
	    "VERTICAL" => "Vertical",
	    "WEBPAGE" => "Webpage",
	    "YOUTUBE_CHANNEL" => "YouTube Channel",
	    "YOUTUBE_VIDEO" => "YouTube Video",
	    "CUSTOM_IN_MARKET" => "Custom In-Market"
	];
};
