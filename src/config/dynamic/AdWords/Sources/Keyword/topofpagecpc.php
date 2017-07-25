<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_FloatParser_Parsable;

return new class extends Source_FloatParser_Parsable {

	public $entity = 'Keyword';

	public $fields = [
	    "TopOfPageCpc"
	];

	public $id = 'topofpagecpc';

	public $metric = 'topofpagecpc';

	public $platform = 'adwords';

	public $property = 'TopOfPageCpc';

	public $report = 'KEYWORDS_PERFORMANCE_REPORT';

	public $type = 'currency';
};
