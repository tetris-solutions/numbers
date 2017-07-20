<?php
namespace Tetris\Numbers\Generated\AdWords\Source;

use Tetris\Numbers\Base\Parsable;
use Tetris\Numbers\Base\Parser\IntegerParser;
use Tetris\Numbers\Base\Source;
use Tetris\Numbers\Base\Summable;
use Tetris\Numbers\Base\Sum\TrivialSum;

class AdWordsSourceIntegerParserTrivialSumParsableSummable extends Source implements Parsable, Summable {

	use IntegerParser;
	use TrivialSum;
}
