<?php
namespace Tetris\Numbers\Generated\Shared\Attribute;

use Tetris\Numbers\Base\Attribute;
use Tetris\Numbers\Base\Parsable;
use Tetris\Numbers\Base\Parser\IntegerParser;

class Attribute_IntegerParser_Parsable extends Attribute implements Parsable {

	use IntegerParser;
}
