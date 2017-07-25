<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_ComplexValueParser_Parsable;

return new class extends Source_ComplexValueParser_Parsable {

	public $entity = 'Campaign';

	public $fields = [
	    "SearchExactMatchImpressionShare"
	];

	public $id = 'searchexactmatchimpressionshare';

	public $metric = 'searchexactmatchimpressionshare';

	public $platform = 'adwords';

	public $property = 'SearchExactMatchImpressionShare';

	public $report = 'CAMPAIGN_PERFORMANCE_REPORT';

	public $type = 'special';
};
