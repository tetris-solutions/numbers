<?php

namespace Tetris\Numbers\Generator\Shared;


class AttributeTranslator
{
    /**
     * @var string
     */
    private $entity;
    /**
     * @var array
     */
    private $dictionary;
    /**
     * @var string
     */
    private $prefix;

    /**
     * AttributeTranslator constructor.
     * @param string $entity
     * @param array $dictionary
     * @param string|null $prefix
     */
    function __construct(string $entity, array $dictionary, $prefix = null)
    {
        $this->entity = $entity;
        $this->dictionary = $dictionary;
        $this->prefix = $prefix
            ? is_array($prefix) ? $prefix : [$prefix]
            : [$entity];
    }

    /**
     * @param string $entity
     * @param string $property
     * @return null|string
     */
    function translate(string $entity, string $property)
    {
        if ($entity !== $this->entity) {
            return null;
        }

        foreach ($this->prefix as $prefix) {
            foreach ($this->dictionary as $key => $value) {
                if (is_numeric($key) && substr($property, 0, strlen($prefix)) === $prefix) {
                    $original = $value;
                    $replacement = substr($original, strlen($prefix));
                } else {
                    $original = $key;
                    $replacement = $value;
                }

                if ($original === $property) {
                    echo "[$prefix] $original === $property :: $replacement\n";
                    return $replacement;
                }
            }
        }

        return null;
    }
}