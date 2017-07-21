<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_ComplexValueParser_Parsable;

return new class extends Source_ComplexValueParser_Parsable {

	public $entity = 'Keyword';

	public $fields = [
	    "SearchExactMatchImpressionShare"
	];

	public $id = 'searchexactmatchimpressionshare';

	public $metric = 'searchexactmatchimpressionshare';

	public $platform = 'adwords';

	public $property = 'SearchExactMatchImpressionShare';

	public $report = 'KEYWORDS_PERFORMANCE_REPORT';

	public $type = 'special';
};
