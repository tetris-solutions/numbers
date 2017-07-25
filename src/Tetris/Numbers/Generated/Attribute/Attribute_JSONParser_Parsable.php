<?php
namespace Tetris\Numbers\Generated\Attribute;

use Tetris\Numbers\Base\Attribute;
use Tetris\Numbers\Base\Parsable;
use Tetris\Numbers\Base\Parser\JSONParser;

class Attribute_JSONParser_Parsable extends Attribute implements Parsable {

	use JSONParser;
}
