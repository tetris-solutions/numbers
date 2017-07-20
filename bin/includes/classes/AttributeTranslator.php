<?php

namespace Tetris\Numbers;


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
        $this->prefix = $prefix ? $prefix : $entity;
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

        foreach ($this->dictionary as $key => $value) {
            if (is_numeric($key)) {
                $original = $value;
                $replacement = substr($original, strlen($this->prefix));
            } else {
                $original = $key;
                $replacement = $value;
            }

            if ($original === $property) {
                return $replacement;
            }
        }

        return null;
    }
}