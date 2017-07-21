<?php

namespace Tetris\Numbers\Report\MetaData;


interface MetaDataReader
{
    static function listAttributes(string $platform, string $entity): array;

    static function getSources(string $platform, string $entity): array;

    static function getReport(string $platform, string $reportName): array;

    static function getMetricSource(string $platform, string $entity, string $metric);
}