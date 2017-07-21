<?php
namespace Tetris\Numbers\Generated\AdWords\Source;

use Tetris\Numbers\Base\Parsable;
use Tetris\Numbers\Base\Parser\CPV100Parser;
use Tetris\Numbers\Base\Source;
use Tetris\Numbers\Base\Summable;
use Tetris\Numbers\Base\Sum\CPV100Sum;

class CPV100Parser_CPV100Sum_Parsable_Summable extends Source implements Parsable, Summable {

	use CPV100Parser;
	use CPV100Sum;
}
