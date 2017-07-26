<?php
namespace Tetris\Numbers\Generated\Shared\Metric;

use Tetris\Numbers\Base\Metric;
use Tetris\Numbers\Base\Parsable;
use Tetris\Numbers\Base\Parser\RatioParser;
use Tetris\Numbers\Base\Summable;
use Tetris\Numbers\Base\Sum\RatioSum;

class Metric_RatioParser_RatioSum_Parsable_Summable extends Metric implements Parsable, Summable {

	use RatioParser;
	use RatioSum;
}
