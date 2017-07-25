<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_FloatParser_Parsable;

return new class extends Source_FloatParser_Parsable {

	public $entity = 'Keyword';

	public $fields = [
	    "CpmBid"
	];

	public $id = 'cpmbid';

	public $metric = 'cpmbid';

	public $platform = 'adwords';

	public $property = 'CpmBid';

	public $report = 'KEYWORDS_PERFORMANCE_REPORT';

	public $type = 'currency';
};
