<?php
namespace Tetris\Numbers\Generated\AdWords\Source;

use Tetris\Numbers\Base\Parsable;
use Tetris\Numbers\Base\Parser\RatioParser;
use Tetris\Numbers\Base\Source;
use Tetris\Numbers\Base\Summable;
use Tetris\Numbers\Base\Sum\RatioSum;

class Source_RatioParser_RatioSum_Parsable_Summable extends Source implements Parsable, Summable {

	use RatioParser;
	use RatioSum;
}
