<?php
namespace Tetris\Numbers\Generated\Metric;

use Tetris\Numbers\Base\Metric;
use Tetris\Numbers\Base\Parsable;
use Tetris\Numbers\Base\Parser\TriangulationParser;
use Tetris\Numbers\Base\Summable;
use Tetris\Numbers\Base\Sum\LostImpressionShareSum;

class Metric_TriangulationParser_LostImpressionShareSum_Parsable_Summable extends Metric implements Parsable, Summable {

	use TriangulationParser;
	use LostImpressionShareSum;
}
