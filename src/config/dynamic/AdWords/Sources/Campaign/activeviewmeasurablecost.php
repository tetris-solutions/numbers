<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_FloatParser_Parsable;

return new class extends Source_FloatParser_Parsable {

	public $entity = 'Campaign';

	public $fields = [
	    "ActiveViewMeasurableCost"
	];

	public $id = 'activeviewmeasurablecost';

	public $metric = 'activeviewmeasurablecost';

	public $platform = 'adwords';

	public $property = 'ActiveViewMeasurableCost';

	public $report = 'CAMPAIGN_PERFORMANCE_REPORT';

	public $type = 'currency';
};
