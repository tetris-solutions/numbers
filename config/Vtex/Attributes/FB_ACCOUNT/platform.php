<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_PlatformParser_Parsable;

return new class extends Attribute_PlatformParser_Parsable {

	public $id = 'platform';

	public $is_dimension = true;

	public $is_filter = false;

	public $is_metric = false;

	public $is_percentage = false;

	public $names = [
	    "en" => "Platform",
	    "pt-BR" => "Plataforma"
	];

	public $platform = 'facebook';

	public $type = 'string';
};
