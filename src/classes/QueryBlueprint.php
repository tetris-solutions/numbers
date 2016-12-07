<?php

namespace Tetris\Numbers;

use DateTime;

class QueryBlueprint
{
    /**
     * @var string
     */
    protected $locale;
    /**
     * @var string $tetrisAccountId
     */
    public $tetrisAccountId;

    /**
     * @var array $dimensions
     */
    public $dimensions;

    /**
     * @var string $entity
     */
    public $entity;

    /**
     * @var array $filters
     */
    public $filters;
    /**
     * ad account
     * @var string $adAccountId
     */
    public $adAccountId;
    /**
     * @var array $metrics
     */
    public $metrics;
    /**
     * @var DateTime|string $since
     */
    public $since;
    /**
     * @var DateTime|string $until
     */
    public $until;

    /**
     * @var string $platform
     */
    public $platform;
}