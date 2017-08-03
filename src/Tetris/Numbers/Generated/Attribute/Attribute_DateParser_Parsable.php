<?php
namespace Tetris\Numbers\Generated\Attribute;

use Tetris\Numbers\Base\Attribute;
use Tetris\Numbers\Base\Parsable;
use Tetris\Numbers\Base\Parser\DateParser;

class Attribute_DateParser_Parsable extends Attribute implements Parsable {

	use DateParser;
}
