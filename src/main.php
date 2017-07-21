<?php

namespace Tetris\Numbers;

use Slim\Http\Request;
use Slim\Http\Response;
use Throwable;

require 'constants.php';
require_once 'logger.php';

global $app;

$container = $app->getContainer();
$container['tkm'] = new TKMApi($app);

function uniq(array $s): array
{
    return array_values(array_unique($s));
}

function omit(array $array, ...$keys): array
{
    foreach ($keys as $key) {
        if (array_key_exists($key, $array)) {
            unset($array[$key]);
        }
    }

    return $array;
}

function flatten(array $array): array
{
    $parsed = [];

    foreach ($array as $key => $value) {
        if (is_array($value) || is_object($value)) {
            $value = (array)$value;
            $size = count($value);

            if ($size > 20) {
                $parsed[$key] = "[ {$size} values ]";
                continue;
            }

            $subArray = flatten($value);

            foreach ($subArray as $subKey => $subValue) {
                $parsed["{$key}_{$subKey}"] = $subValue;
            }
        } else {
            $parsed[$key] = is_string($value) ? $value : (string)$value;
        }
    }

    return $parsed;
}

function secured(string $action, \Closure $routeHandler): callable
{
    return function (Request $request, Response $response, array $params) use ($action, $routeHandler): Response {
        global $logger;

        $req = [
            'body' => $request->getParsedBody(),
            'url' => $request->getUri()->getPath(),
            'search' => $request->getQueryParams(),
            'params' => $params
        ];

        try {
            $routeHandler = $routeHandler->bindTo($this);
            $result = $routeHandler($request, $response, $params);

            $logger->debug("request {$action}", flatten([
                'category' => 'action',
                'action' => $action,
                'request' => $req
            ]));

            return $result;
        } catch (Throwable $e) {
            $logger->warning("{$action} failure", flatten([
                'category' => 'event',
                'event' => 'report-failure',
                'request' => $req,
                'error' => [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage(),
                    'stack' => $e->getTraceAsString()
                ]
            ]));

            throw $e;
        }
    };
}

function makeAccountAccessException(string $locale, Query $query, Throwable $e): array
{
    return [
        'code' => 403,

        'message' => $locale === 'pt-BR'
            ? "O accesso a conta '{$query->adAccountId}' foi perdido! O resultado do relatório provavelmente está imcompleto."
            : "We have lost access to the account '{$query->adAccountId}'! The report result is probably incomplete.",

        'account' => [
            'platform' => $query->platform,
            'tetris_account' => $query->tetrisAccountId,
            'ad_account' => $query->adAccountId
        ],

        'parentException' => [
            'code' => $e->getCode(),
            'message' => $e->getMessage()
        ]
    ];
}

function parseReportException(string $locale, Query $query, Throwable $e): array
{
    $exceptionMessage = $e->getMessage();

    $isAccountException = (
        stripos($exceptionMessage, 'permission') !== FALSE ||
        stripos($exceptionMessage, 'authentication') !== FALSE ||
        stripos($exceptionMessage, 'authorization') !== false
    );

    if ($isAccountException) {
        return makeAccountAccessException($locale, $query, $e);
    } else {
        throw $e;
    }
}

require 'routes/report.php';
require 'routes/meta-data.php';
require 'routes/cross-platform-meta-data.php';
require 'routes/cross-platform-report.php';