<?php
namespace Tetris\Numbers\Generated\AdWords\Source;

use Tetris\Numbers\Base\Parsable;
use Tetris\Numbers\Base\Parser\TriangulationParser;
use Tetris\Numbers\Base\Source;
use Tetris\Numbers\Base\Summable;
use Tetris\Numbers\Base\Sum\LostImpressionShareSum;

class TriangulationParser_LostImpressionShareSum_Parsable_Summable extends Source implements Parsable, Summable {

	use TriangulationParser;
	use LostImpressionShareSum;
}
