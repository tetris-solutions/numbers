<?php

namespace Tetris\Numbers;


interface MetaDataReader
{
    static function listAttributes(string $platform, string $entity): array;

    static function getSources(string $platform, string $entity): array;

    static function getReport(string $platform, string $reportName): array;
}