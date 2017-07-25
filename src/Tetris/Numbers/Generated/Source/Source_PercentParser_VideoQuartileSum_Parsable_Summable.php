<?php
namespace Tetris\Numbers\Generated\Source;

use Tetris\Numbers\Base\Parsable;
use Tetris\Numbers\Base\Parser\PercentParser;
use Tetris\Numbers\Base\Source;
use Tetris\Numbers\Base\Summable;
use Tetris\Numbers\Base\Sum\VideoQuartileSum;

class Source_PercentParser_VideoQuartileSum_Parsable_Summable extends Source implements Parsable, Summable {

	use PercentParser;
	use VideoQuartileSum;
}
