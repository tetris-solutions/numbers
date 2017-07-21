<?php
namespace Tetris\Numbers\Generated\AdWords\Source;

use Tetris\Numbers\Base\Parsable;
use Tetris\Numbers\Base\Parser\IntegerParser;
use Tetris\Numbers\Base\Source;
use Tetris\Numbers\Base\Summable;
use Tetris\Numbers\Base\Sum\TrivialSum;

class IntegerParser_TrivialSum_Parsable_Summable extends Source implements Parsable, Summable {

	use IntegerParser;
	use TrivialSum;
}
