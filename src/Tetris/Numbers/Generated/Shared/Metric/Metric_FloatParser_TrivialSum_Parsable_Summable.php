<?php
namespace Tetris\Numbers\Generated\Shared\Metric;

use Tetris\Numbers\Base\Metric;
use Tetris\Numbers\Base\Parsable;
use Tetris\Numbers\Base\Parser\FloatParser;
use Tetris\Numbers\Base\Summable;
use Tetris\Numbers\Base\Sum\TrivialSum;

class Metric_FloatParser_TrivialSum_Parsable_Summable extends Metric implements Parsable, Summable {

	use FloatParser;
	use TrivialSum;
}
