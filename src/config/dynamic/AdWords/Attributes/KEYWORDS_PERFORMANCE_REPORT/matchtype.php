<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {

	public $id = 'matchtype';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'KeywordMatchType';

	public $type = 'keywordmatchtype';

	public $values = [
	    "EXACT" => "Exact",
	    "PHRASE" => "Phrase",
	    "BROAD" => "Broad"
	];
};
