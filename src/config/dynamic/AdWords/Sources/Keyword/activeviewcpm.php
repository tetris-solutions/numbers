<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_Parsable;

return new class extends Source_FloatParser_Parsable {

	public $entity = 'Keyword';

	public $fields = [
	    "ActiveViewCpm"
	];

	public $id = 'activeviewcpm';

	public $metric = 'activeviewcpm';

	public $platform = 'adwords';

	public $property = 'ActiveViewCpm';

	public $report = 'KEYWORDS_PERFORMANCE_REPORT';

	public $type = 'currency';
};
