<?php
namespace Tetris\Numbers\Generated\Metric;

use Tetris\Numbers\Base\Metric;
use Tetris\Numbers\Base\Parsable;
use Tetris\Numbers\Base\Parser\ViewRateParser;
use Tetris\Numbers\Base\Summable;
use Tetris\Numbers\Base\Sum\RatioSum;

class Metric_ViewRateParser_RatioSum_Parsable_Summable extends Metric implements Parsable, Summable {

	use ViewRateParser;
	use RatioSum;
}
