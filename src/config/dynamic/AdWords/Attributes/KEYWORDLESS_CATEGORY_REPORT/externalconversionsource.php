<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "externalconversionsource";
	public $property = "ExternalConversionSource";
	public $is_filter = true;
	public $type = "externalconversionsource";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"UNKNOWN":"Other","WEBPAGE":"Website","ANALYTICS":"Analytics","UPLOAD":"Import from clicks","AD_CALL_METRICS":"Calls from ads","OFFERS":"Offers","ENGAGEMENT":"Engagement ads","WEBSITE_CALL_METRICS":"Calls from website","STORE_VISITS":"Store visits","ANDROID_IN_APP":"Android in-app action","ANDROID_DOWNLOAD":"Android app install (from Google Play)","IOS_IN_APP":"iOS in-app action","IOS_FIRST_OPEN":"iOS app install (first open)","APP_UNSPECIFIED":"Mobile app","ANDROID_FIRST_OPEN":"Android app install (first open)","UPLOAD_CALLS":"Import from calls","FIREBASE":"Firebase","CLICK_TO_CALL":"Phone number clicks","SALESFORCE":"Salesforce.com","STORE_SALES_CRM":"Store sales (data partner)","STORE_SALES_PAYMENT_NETWORK":"Store sales (payment network)","GOOGLE_PLAY":"Google Play","THIRD_PARTY_APP_ANALYTICS":"Third-party app analytics","GOOGLE_ATTRIBUTION":"Google Attribution"};
	public $incompatible = ["AverageCpc","AverageCpm","Clicks","Cost","Ctr","Impressions"];
	public $platform = "adwords";
	public $raw_property = "ExternalConversionSource";
};
