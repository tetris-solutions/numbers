<?php
namespace Tetris\Numbers\Generated\Metric;

use Tetris\Numbers\Base\Metric;
use Tetris\Numbers\Base\Parsable;
use Tetris\Numbers\Base\Parser\CPV100Parser;
use Tetris\Numbers\Base\Summable;
use Tetris\Numbers\Base\Sum\CPV100Sum;

class Metric_CPV100Parser_CPV100Sum_Parsable_Summable extends Metric implements Parsable, Summable {

	use CPV100Parser;
	use CPV100Sum;
}
