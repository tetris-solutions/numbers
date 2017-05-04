<?php

namespace Tetris\Numbers;

use stdClass;

class Translation
{
    public $platformAttribute;
    public $globalAttribute;
    private $fn;

    function __construct(string $platformAttribute, string $globalAttribute, callable $transform)
    {
        $this->platformAttribute = $platformAttribute;
        $this->globalAttribute = $globalAttribute;
        $this->fn = $transform;
    }

    function transform($value, $metaData = null)
    {
        $fn = $this->fn;

        return $fn($value, $metaData);
    }
}

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
        return isset($this->vocabulary[$platformAttribute])
            ? $this->vocabulary[$platformAttribute]
            : null;
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

class XQuery extends QueryBlueprint
{
    public $id;
    public $translator;
    private $auxiliary;
    private $query;

    function __construct(
        string $adAccount,
        string $tetrisAccount,
        string $platform,
        string $since,
        string $until,
        string $entity,
        $gaViewId,
        $gaPropertyId,
        string $locale)
    {
        $this->id = self::id($tetrisAccount, $adAccount);
        $this->adAccountId = $adAccount;
        $this->tetrisAccountId = $tetrisAccount;
        $this->platform = $platform;
        $this->since = $since;
        $this->until = $until;
        $this->dimensions = [];
        $this->metrics = [];
        $this->auxiliary = [];
        $this->filters = ['id' => []];
        $this->entity = $entity;
        $this->locale = $locale;
        $this->gaViewId = $gaViewId;
        $this->gaPropertyId = $gaPropertyId;

        $this->translator = new Translator();
    }

    static function id(string $tetrisAccount, $adAccount)
    {
        return $tetrisAccount . ':' . $adAccount;
    }

    private function hasPlatformPrefix(string $attributeId): bool
    {
        return strpos($attributeId, "{$this->platform}:") === 0;
    }

    private function notPrefixed(string $attributeId)
    {
        return (
            strpos($attributeId, 'adwords:') !== 0 &&
            strpos($attributeId, 'facebook:') !== 0 &&
            strpos($attributeId, 'analytics:') !== 0
        );
    }

    private function removePrefix(string $attributeId)
    {
        return substr($attributeId, strpos($attributeId, ':') + 1);
    }

    function addDimensions(array $dimensions, $isAuxiliary = false)
    {
        $same = function ($val) {
            return $val;
        };

        $idTransform = function (string $id, XQuery $xQuery) {
            return "{$xQuery->tetrisAccountId}:{$xQuery->adAccountId}:{$id}";
        };

        foreach ($dimensions as $globalAttributeId) {
            if ($globalAttributeId === 'id') {

                $platformAttributeId = $globalAttributeId;
                $transform = $idTransform;

            } else if ($this->hasPlatformPrefix($globalAttributeId)) {

                $platformAttributeId = $this->removePrefix($globalAttributeId);
                $transform = $same;

            } else if ($this->notPrefixed($globalAttributeId)) {

                if ($isAuxiliary) {
                    $replacement = MetaData::getAttributeMerge($globalAttributeId, $this->platform);
                    $platformAttributeId = $globalAttributeId;
                    $globalAttributeId = $replacement['id'];
                } else {
                    $replacement = MetaData::getPlatformSpecificAttribute($globalAttributeId, $this->platform);
                    $platformAttributeId = $replacement['id'];
                }

                $transform = $replacement['transform'];

            } else continue;

            $this->dimensions[] = $platformAttributeId;
            $this->translator->addTranslation($platformAttributeId, $globalAttributeId, $transform);
        }
    }

    function addMetrics(array $metrics, $isAuxiliary = false)
    {
        $same = function ($val) {
            return $val;
        };

        foreach ($metrics as $globalAttributeId) {
            if ($this->hasPlatformPrefix($globalAttributeId)) {
                $platformAttributeId = $this->removePrefix($globalAttributeId);
                $transform = $same;
            } else if ($this->notPrefixed($globalAttributeId)) {
                if ($isAuxiliary) {
                    $replacement = MetaData::getAttributeMerge($globalAttributeId, $this->platform);
                    $platformAttributeId = $globalAttributeId;
                    $globalAttributeId = $replacement['id'];
                } else {
                    $replacement = MetaData::getPlatformSpecificAttribute($globalAttributeId, $this->platform);
                    $platformAttributeId = $replacement['id'];
                }

                $transform = $replacement['transform'];

            } else continue;

            $this->metrics[] = $platformAttributeId;
            $this->translator->addTranslation($platformAttributeId, $globalAttributeId, $transform);
        }
    }

    function ids(array $ids)
    {
        $cleanId = function (string $id): string {
            return substr($id, strlen("{$this->id}:"));
        };

        $matchesAccount = function (string $id) {
            return strpos($id, $this->id) === 0;
        };

        return array_values(array_map($cleanId, array_filter($ids, $matchesAccount)));
    }

    function addFilters(array $filters)
    {
        $same = function ($val) {
            return $val;
        };

        foreach ($filters as $globalAttributeId => $values) {
            if ($globalAttributeId === 'id') {
                $platformAttributeId = $globalAttributeId;
                $transform = $same;

                $values = $this->ids($values);
            } else if ($this->hasPlatformPrefix($globalAttributeId)) {
                $platformAttributeId = $this->removePrefix($globalAttributeId);
                $transform = $same;
            } else if ($this->notPrefixed($globalAttributeId)) {
                $replacement = MetaData::getPlatformSpecificAttribute($globalAttributeId, $this->platform);

                $platformAttributeId = $replacement['id'];
                $transform = $replacement['transform'];
            } else {
                continue;
            }

            $this->filters[$platformAttributeId] = $values;
            $this->translator->addTranslation($platformAttributeId, $globalAttributeId, $transform);
        }
    }

    private function wire()
    {
        $this->query = new Query($this->locale, [
            'ad_account' => $this->adAccountId,
            'tetris_account' => $this->tetrisAccountId,
            'entity' => $this->entity,
            'platform' => $this->platform,
            'from' => $this->since,
            'to' => $this->until,
            'metrics' => $this->metrics,
            'dimensions' => $this->dimensions,
            'filters' => $this->filters,
            'ga_view_id' => $this->gaViewId,
            'ga_property_id' => $this->gaPropertyId
        ]);

        foreach ($this->query->report->auxiliary as $attributeId) {
            $isMetric = isset($this->query->report->metrics[$attributeId]);

            $this->auxiliary[] = $attributeId;

            if ($isMetric) {
                $this->addMetrics([$attributeId], true);
            } else {
                $this->addDimensions([$attributeId], true);
            }
        }
    }

    function toRegularQuery(): Query
    {
        if (empty($this->query)) {
            $this->wire();
        }

        return $this->query;
    }

    function isAuxiliary($attributeId)
    {
        return in_array($attributeId, $this->auxiliary);
    }
}

class RowFacade
{
    private $finder;
    public $__source__;

    function __construct(callable $findAttribute, stdClass $source)
    {
        $this->__source__ = $source;
        $this->finder = $findAttribute;
    }

    function __isset($name)
    {
        return call_user_func($this->finder, $name) !== NULL;
    }

    function __get($name)
    {
        return call_user_func($this->finder, $name);
    }
}

class CrossPlatformReport
{
    public $queries;
    private $aliases;

    function __construct()
    {
        $this->queries = [];
        $this->aliases = [];
    }

    function addAccount(string $locale, array $account, array $body)
    {
        $id = XQuery::id($account['tetris_account'], $account['ad_account']);

        if (isset($this->queries[$id])) return;

        $query = new XQuery(
            $account['ad_account'],
            $account['tetris_account'],
            $account['platform'],
            $body['from'],
            $body['to'],
            $body['entity'],
            isset($account['ga_view_id']) ? $account['ga_view_id'] : null,
            isset($account['ga_property_id']) ? $account['ga_property_id'] : null,
            $locale
        );

        $query->addDimensions($body['dimensions']);
        $query->addMetrics($body['metrics']);
        $query->addFilters($body['filters']);

        if (empty($query->filters['id'])) return;

        $this->queries[$id] = $query;
    }

    function obfuscate(XQuery $xQuery, stdClass $row): RowFacade
    {
        $data = new stdClass();

        foreach ($row as $platformAttribute => $value) {
            $translation = $xQuery->translator->getTranslation($platformAttribute);

            if ($translation) {
                $data->{$translation->globalAttribute} = $translation->transform($value, $xQuery);
                $this->aliases[$platformAttribute] = $translation->globalAttribute;
            } else {
                $data->{$platformAttribute} = $value;
            }
        }

        $finder = function ($name) use ($data) {
            if (isset($data->{$name})) {
                return $data->{$name};
            }

            $alias = isset($this->aliases[$name])
                ? $this->aliases[$name]
                : null;

            if ($alias && isset($data->{$alias})) {
                return $data->{$alias};
            }

            return null;
        };

        $finder->bindTo($this);

        return new RowFacade($finder, $row);
    }

    function getDimensions()
    {
        $dimensions = [];
        /**
         * @var XQuery $xQuery
         */
        foreach ($this->queries as $xQuery) {
            foreach ($xQuery->dimensions as $platformAttributeId) {
                if (!$xQuery->isAuxiliary($platformAttributeId)) {
                    $translation = $xQuery->translator->getTranslation($platformAttributeId);

                    $dimensions[$translation->globalAttribute] = $translation->globalAttribute;
                }
            }
        }

        return array_values($dimensions);
    }

    function getMetrics()
    {
        $metrics = [];
        /**
         * @var XQuery $xQuery
         */
        foreach ($this->queries as $xQuery) {
            foreach ($xQuery->metrics as $platformAttributeId) {
                if (!$xQuery->isAuxiliary($platformAttributeId)) {
                    $metricConfig = $xQuery->toRegularQuery()->report->metrics[$platformAttributeId];
                    $translation = $xQuery->translator->getTranslation($platformAttributeId);

//                    $isCanonicalMetric = $translation->globalAttribute === $platformAttributeId;
                    $isCanonicalMetric = $xQuery->platform === 'adwords' ||
                        strpos($translation->globalAttribute, 'analytics:') === 0;

                    if ($isCanonicalMetric) {
                        $metrics[$translation->globalAttribute] = $metricConfig;
                    }
                }
            }
        }

        return $metrics;
    }

    function filters()
    {
        $filters = [];
        /**
         * @var XQuery $xQuery
         */
        foreach ($this->queries as $xQuery) {
            foreach ($xQuery->filters as $platformAttributeId => $_) {
                if ($platformAttributeId === 'id') continue;

                $translation = $xQuery->translator->getTranslation($platformAttributeId);
                $values = $xQuery->toRegularQuery()->report->filters[$platformAttributeId];

                $filters[$translation->globalAttribute] = $values;
            }
        }

        return $filters;
    }
}