<?php
namespace Tetris\Numbers\Generated\AdWords\Source;

use Tetris\Numbers\Base\Parsable;
use Tetris\Numbers\Base\Parser\TriangulationParser;
use Tetris\Numbers\Base\Source;
use Tetris\Numbers\Base\Summable;
use Tetris\Numbers\Base\Sum\ImpressionShareSum;

class Source_TriangulationParser_ImpressionShareSum_Parsable_Summable extends Source implements Parsable, Summable {

	use TriangulationParser;
	use ImpressionShareSum;
}
