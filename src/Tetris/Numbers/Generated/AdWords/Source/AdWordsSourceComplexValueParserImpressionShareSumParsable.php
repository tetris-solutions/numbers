<?php
namespace Tetris\Numbers\Generated\AdWords\Source;

use Tetris\Numbers\Base\Parsable;
use Tetris\Numbers\Base\Parser\ComplexValueParser;
use Tetris\Numbers\Base\Source;
use Tetris\Numbers\Base\Sum\ImpressionShareSum;

class AdWordsSourceComplexValueParserImpressionShareSumParsable extends Source implements Parsable {

	use ComplexValueParser;
	use ImpressionShareSum;
}
