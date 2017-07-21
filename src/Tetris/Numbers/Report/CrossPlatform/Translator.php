<?php

namespace Tetris\Numbers\Report\CrossPlatform;

class Translator
{
    private $vocabulary = [];

    function addTranslation(string $platformAttribute, string $globalAttribute, callable $transformFn)
    {
        if (empty($this->vocabulary[$platformAttribute])) {
            $this->vocabulary[$platformAttribute] = new Translation($platformAttribute, $globalAttribute, $transformFn);
        }
    }

    /**
     * @param string $platformAttribute
     * @return Translation|null
     */
    function getTranslation(string $platformAttribute)
    {
        return $this->vocabulary[$platformAttribute] ?? null;
    }

    function getPlatformAttributeName(string $globalAttribute)
    {
        /**
         * @var Translation $translation
         */
        foreach ($this->vocabulary as $translation) {
            if ($translation->platformAttribute === $globalAttribute) {
                return $translation->platformAttribute;
            }
        }

        return null;
    }
}