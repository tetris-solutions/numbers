<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_Parsable;

return new class extends Metric_FloatParser_Parsable {

	public $entity = 'Order';

	public $fields = [
	    "item_additionalInfo.dimension.height"
	];

	public $id = 'item_additionalinfo.dimension.height';

	public $metric = 'item_additionalinfo.dimension.height';

	public $platform = 'vtex';

	public $property = 'item_additionalInfo.dimension.height';

	public $report = 'VTEX_ORDER';

	public $type = 'decimal';
};
