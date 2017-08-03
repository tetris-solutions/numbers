<?php

namespace Tetris\Numbers\Base;

use Tetris\Numbers\Utils\GenericArrayAccess;
use ArrayAccess;

abstract class Field implements ArrayAccess
{
    use GenericArrayAccess;
    use FieldMetaData;

    /**
     * @var string
     */
    public $id;
    /**
     * @var string
     */
    public $property;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $platform;

    /**
     * @var array|null
     */
    public $names;

    /**
     * @var string|null
     */
    public $group;

    private function getPath($pointer, string $path)
    {
        $parts = explode('.', $path);

        while (!empty($parts) && (is_object($pointer) || is_array($pointer))) {
            $property = array_shift($parts);

            if (is_object($pointer) && property_exists($pointer, $property)) {
                $pointer = $pointer->{$property};
                continue;
            }

            if (is_array($pointer)) {
                if (array_key_exists($property, $pointer)) {
                    $pointer = $pointer[$property];
                    continue;
                }

                $property = is_numeric($property) ? (int)$property : $property;

                if (array_key_exists($property, $pointer)) {
                    $pointer = $pointer[$property];
                    continue;
                }
            }

            $pointer = NULL;
        }

        return $pointer;
    }

    protected function getValue($source)
    {
        return $source->{$this->property} ?? $this->getPath($source, $this->property);
    }

    protected function getNumericValue($source): string
    {
        return str_replace(['%', ','], '', $this->getValue($source));
    }
}
