<?php
namespace Tetris\Numbers\Generated\Source;

use Tetris\Numbers\Base\Parsable;
use Tetris\Numbers\Base\Parser\FloatParser;
use Tetris\Numbers\Base\Source;
use Tetris\Numbers\Base\Summable;
use Tetris\Numbers\Base\Sum\RatioSum;

class Source_FloatParser_RatioSum_Parsable_Summable extends Source implements Parsable, Summable {

	use FloatParser;
	use RatioSum;
}
