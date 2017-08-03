<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_Parsable;

return new class extends Metric_FloatParser_Parsable {

	public $entity = 'Order';

	public $fields = [
	    "item_additionalInfo.dimension.cubicweight"
	];

	public $group = 'get';

	public $id = 'item_additionalinfo.dimension.cubicweight';

	public $metric = 'item_additionalinfo.dimension.cubicweight';

	public $platform = 'vtex';

	public $property = 'item_additionalInfo.dimension.cubicweight';

	public $report = 'VTEX_ORDER';

	public $type = 'decimal';
};
