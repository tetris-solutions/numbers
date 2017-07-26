<?php
namespace Tetris\Numbers\Generated\Shared\Metric;

use Tetris\Numbers\Base\Metric;
use Tetris\Numbers\Base\Parsable;
use Tetris\Numbers\Base\Parser\FacebookCPV100Parser;
use Tetris\Numbers\Base\Summable;
use Tetris\Numbers\Base\Sum\RatioSum;

class Metric_FacebookCPV100Parser_RatioSum_Parsable_Summable extends Metric implements Parsable, Summable {

	use FacebookCPV100Parser;
	use RatioSum;
}
