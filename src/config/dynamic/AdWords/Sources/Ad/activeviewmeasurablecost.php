<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_Parsable;

return new class extends Source_FloatParser_Parsable {

	public $entity = 'Ad';

	public $fields = [
	    "ActiveViewMeasurableCost"
	];

	public $id = 'activeviewmeasurablecost';

	public $metric = 'activeviewmeasurablecost';

	public $platform = 'adwords';

	public $property = 'ActiveViewMeasurableCost';

	public $report = 'AD_PERFORMANCE_REPORT';

	public $type = 'currency';
};
