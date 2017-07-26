<?php

namespace Tetris\Numbers\Report\CrossPlatform;

use Tetris\Numbers\Report\MetaData\MetaData;
use Tetris\Numbers\Report\MetaData\MetaDataV2;
use Tetris\Numbers\Report\Query\Query;
use Tetris\Numbers\Report\Query\QueryBlueprint;

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
                    $replacement = MetaDataV2::getAttributeMerge($globalAttributeId, $this->platform);
                    $platformAttributeId = $globalAttributeId;
                    $globalAttributeId = $replacement['id'];
                } else {
                    $replacement = MetaDataV2::getPlatformSpecificAttribute($globalAttributeId, $this->platform);
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
                    $replacement = MetaDataV2::getAttributeMerge($globalAttributeId, $this->platform);
                    $platformAttributeId = $globalAttributeId;
                    $globalAttributeId = $replacement['id'];
                } else {
                    $replacement = MetaDataV2::getPlatformSpecificAttribute($globalAttributeId, $this->platform);
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
                $replacement = MetaDataV2::getPlatformSpecificAttribute($globalAttributeId, $this->platform);

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