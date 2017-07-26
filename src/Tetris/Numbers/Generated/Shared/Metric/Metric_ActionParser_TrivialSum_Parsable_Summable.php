<?php
namespace Tetris\Numbers\Generated\Shared\Metric;

use Tetris\Numbers\Base\Metric;
use Tetris\Numbers\Base\Parsable;
use Tetris\Numbers\Base\Parser\ActionParser;
use Tetris\Numbers\Base\Summable;
use Tetris\Numbers\Base\Sum\TrivialSum;

class Metric_ActionParser_TrivialSum_Parsable_Summable extends Metric implements Parsable, Summable {

	use ActionParser;
	use TrivialSum;
}
