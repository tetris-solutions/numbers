<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "matchtype";
	public $property = "KeywordMatchType";
	public $is_filter = true;
	public $type = "keywordmatchtype";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"EXACT":"Exact","PHRASE":"Phrase","BROAD":"Broad"};
	public $platform = "adwords";
	public $raw_property = "KeywordMatchType";
};
