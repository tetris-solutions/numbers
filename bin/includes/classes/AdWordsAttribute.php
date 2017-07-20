<?php

namespace Tetris\Numbers;

class AdWordsAttribute
{
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
    public $raw_property;
    /**
     * @var bool
     */
    public $is_filter;
    /**
     * @var string
     */
    public $type;
    /**
     * @var bool
     */
    public $is_metric;
    /**
     * @var bool
     */
    public $is_dimension;
    /**
     * @var bool
     */
    public $is_percentage;
    /**
     * @var array|null
     */
    public $values;
    /**
     * @var array|null
     */
    public $incompatible;
    /**
     * @var callable|null
     */
    public $parse;

    function asArray(): array
    {
        $array = [
            "id" => $this->id,
            "property" => $this->property,
            "is_filter" => $this->is_filter,
            "type" => $this->type,
            "is_metric" => $this->is_metric,
            "is_dimension" => $this->is_dimension,
            "is_percentage" => $this->is_percentage
        ];

        foreach (['values', 'incompatible', 'parse'] as $key) {
            if (isset($this->{$key})) {
                $array[$key] = $this->{$key};
            }
        }

        return $array;
    }

    static function __set_state($an_array): self
    {
        $instance = new self();

        foreach ($an_array as $key => $value) {
            if (property_exists(self::class, $key)) {
                $instance->{$key} = $value;
            }
        }

        return $instance;
    }
}
