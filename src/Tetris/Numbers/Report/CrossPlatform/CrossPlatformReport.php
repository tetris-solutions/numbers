<?php

namespace Tetris\Numbers\Report\CrossPlatform;

use stdClass;

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
            $account['ga_view_id'] ?? null,
            $account['ga_property_id'] ?? null,
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

            $alias = $this->aliases[$name] ?? null;

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

    function containsPlatform(string $platform)
    {
        /**
         * @var XQuery $xQuery
         */
        foreach ($this->queries as $xQuery) {
            if ($xQuery->platform === $platform) {
                return true;
            }
        }

        return false;
    }
}