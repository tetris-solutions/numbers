<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Order';

	public $fields = [
	    "item_additionalInfo.dimension.length"
	];

	public $id = 'item_additionalinfo.dimension.length';

	public $metric = 'item_additionalinfo.dimension.length';

	public $platform = 'vtex';

	public $property = 'item_additionalInfo.dimension.length';

	public $report = 'VTEX_ORDER';

	public $type = 'integer';
};
