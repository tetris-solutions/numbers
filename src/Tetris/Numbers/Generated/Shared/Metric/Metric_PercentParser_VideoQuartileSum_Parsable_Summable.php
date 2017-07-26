<?php
namespace Tetris\Numbers\Generated\Shared\Metric;

use Tetris\Numbers\Base\Metric;
use Tetris\Numbers\Base\Parsable;
use Tetris\Numbers\Base\Parser\PercentParser;
use Tetris\Numbers\Base\Summable;
use Tetris\Numbers\Base\Sum\VideoQuartileSum;

class Metric_PercentParser_VideoQuartileSum_Parsable_Summable extends Metric implements Parsable, Summable {

	use PercentParser;
	use VideoQuartileSum;
}
