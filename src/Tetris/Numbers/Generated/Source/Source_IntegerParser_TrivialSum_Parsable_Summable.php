<?php
namespace Tetris\Numbers\Generated\Source;

use Tetris\Numbers\Base\Parsable;
use Tetris\Numbers\Base\Parser\IntegerParser;
use Tetris\Numbers\Base\Source;
use Tetris\Numbers\Base\Summable;
use Tetris\Numbers\Base\Sum\TrivialSum;

class Source_IntegerParser_TrivialSum_Parsable_Summable extends Source implements Parsable, Summable {

	use IntegerParser;
	use TrivialSum;
}
