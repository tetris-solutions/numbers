<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $id = 'externalconversionsource';

	public $incompatible = [
	    "averagecpc",
	    "clicks",
	    "cost",
	    "ctr",
	    "impressions",
	    "searchclickshare",
	    "searchimpressionshare"
	];

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'ExternalConversionSource';

	public $type = 'externalconversionsource';

	public $values = [
	    "UNKNOWN" => "Other",
	    "WEBPAGE" => "Website",
	    "ANALYTICS" => "Analytics",
	    "UPLOAD" => "Import from clicks",
	    "AD_CALL_METRICS" => "Calls from ads",
	    "OFFERS" => "Offers",
	    "ENGAGEMENT" => "Engagement ads",
	    "WEBSITE_CALL_METRICS" => "Calls from website",
	    "STORE_VISITS" => "Store visits",
	    "ANDROID_IN_APP" => "Android in-app action",
	    "ANDROID_DOWNLOAD" => "Android app install (from Google Play)",
	    "IOS_IN_APP" => "iOS in-app action",
	    "IOS_FIRST_OPEN" => "iOS app install (first open)",
	    "APP_UNSPECIFIED" => "Mobile app",
	    "ANDROID_FIRST_OPEN" => "Android app install (first open)",
	    "UPLOAD_CALLS" => "Import from calls",
	    "FIREBASE" => "Firebase",
	    "CLICK_TO_CALL" => "Phone number clicks",
	    "SALESFORCE" => "Salesforce.com",
	    "STORE_SALES_CRM" => "Store sales (data partner)",
	    "STORE_SALES_PAYMENT_NETWORK" => "Store sales (payment network)",
	    "GOOGLE_PLAY" => "Google Play",
	    "THIRD_PARTY_APP_ANALYTICS" => "Third-party app analytics",
	    "GOOGLE_ATTRIBUTION" => "Google Attribution"
	];
};
