<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_FloatParser_RatioSum_Parsable_Summable;

return new class extends Source_FloatParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'numofflineinteractions';

	public $divisorMetric = 'numofflineimpressions';

	public $entity = 'Campaign';

	public $fields = [
	    "OfflineInteractionRate"
	];

	public $id = 'offlineinteractionrate';

	public $inferred_from = [
	    "numofflineinteractions",
	    "numofflineimpressions"
	];

	public $metric = 'offlineinteractionrate';

	public $platform = 'adwords';

	public $property = 'OfflineInteractionRate';

	public $report = 'CAMPAIGN_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
