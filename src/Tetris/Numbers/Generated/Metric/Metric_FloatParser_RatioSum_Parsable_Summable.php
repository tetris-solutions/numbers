<?php
namespace Tetris\Numbers\Generated\Metric;

use Tetris\Numbers\Base\Metric;
use Tetris\Numbers\Base\Parsable;
use Tetris\Numbers\Base\Parser\FloatParser;
use Tetris\Numbers\Base\Summable;
use Tetris\Numbers\Base\Sum\RatioSum;

class Metric_FloatParser_RatioSum_Parsable_Summable extends Metric implements Parsable, Summable {

	use FloatParser;
	use RatioSum;
}
