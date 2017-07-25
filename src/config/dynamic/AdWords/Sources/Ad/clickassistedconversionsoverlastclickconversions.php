<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Source_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Ad';

	public $fields = [
	    "ClickAssistedConversionsOverLastClickConversions"
	];

	public $id = 'clickassistedconversionsoverlastclickconversions';

	public $metric = 'clickassistedconversionsoverlastclickconversions';

	public $platform = 'adwords';

	public $property = 'ClickAssistedConversionsOverLastClickConversions';

	public $report = 'AD_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
