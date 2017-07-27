<?php
namespace Tetris\Numbers\Generated\Metric;

use Tetris\Numbers\Base\Metric;
use Tetris\Numbers\Base\Parsable;
use Tetris\Numbers\Base\Parser\IntegerParser;
use Tetris\Numbers\Base\Summable;
use Tetris\Numbers\Base\Sum\TrivialSum;

class Metric_IntegerParser_TrivialSum_Parsable_Summable extends Metric implements Parsable, Summable {

	use IntegerParser;
	use TrivialSum;
}
