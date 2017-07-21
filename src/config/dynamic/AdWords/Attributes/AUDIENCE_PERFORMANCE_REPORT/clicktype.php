<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $id = 'clicktype';

	public $incompatible = [
	    "averagecpe",
	    "averagecpv",
	    "engagementrate",
	    "engagements",
	    "videoquartile100rate",
	    "videoquartile25rate",
	    "videoquartile50rate",
	    "videoquartile75rate",
	    "videoviewrate",
	    "videoviews",
	    "viewthroughconversions"
	];

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'ClickType';

	public $type = 'clicktype';

	public $values = [
	    "URL_CLICKS" => "Headline",
	    "CALLS" => "Phone calls",
	    "OTHER" => "Other",
	    "PRODUCT_EXTENSION_CLICKS" => "Product plusbox offer",
	    "SITELINKS" => "Sitelink",
	    "PRODUCT_LISTING_AD_CLICKS" => "Shopping ad - Standard",
	    "GET_DIRECTIONS" => "Driving direction",
	    "OFFER_PRINTS" => "Print offer",
	    "BREADCRUMBS" => "Breadcrumbs",
	    "CALL_TRACKING" => "Manually dialed phone calls",
	    "MOBILE_CALL_TRACKING" => "Mobile phone calls",
	    "LOCATION_EXPANSION" => "Get location details",
	    "STORE_LOCATOR" => "Show nearby locations",
	    "APP_DEEPLINK" => "App engagement ad deep link",
	    "TABLE_EXTENSION" => "Table Extension",
	    "VIDEO_WEBSITE_CLICKS" => "Website",
	    "VIDEO_CALL_TO_ACTION_CLICKS" => "Call-to-Action overlay",
	    "VIDEO_APP_STORE_CLICKS" => "App store",
	    "VIDEO_CARD_ACTION_HEADLINE_CLICKS" => "Cards",
	    "VIDEO_END_CAP_CLICKS" => "End cap",
	    "CLICK_ON_ENGAGEMENT_AD" => "Click on engagement ad",
	    "LOCATION_FORMAT_MAP" => "Map",
	    "LOCATION_FORMAT_LANDING_PAGE" => "Go to landing page",
	    "LOCATION_FORMAT_STORE_INFO" => "Go to store info",
	    "LOCATION_FORMAT_DIRECTIONS" => "Directions",
	    "LOCATION_FORMAT_CALL" => "Call",
	    "LOCATION_FORMAT_TEXT" => "Text",
	    "LOCATION_FORMAT_IMAGE" => "Image(s)",
	    "BROADBAND_PLAN" => "Broadband Plan",
	    "WIRELESS_PLAN" => "Wireless Plan",
	    "VISUAL_SITELINKS" => "Visual Sitelinks",
	    "PROMOTION_EXTENSION" => "Promotion Extension",
	    "UNKNOWN" => "unknown"
	];
};
