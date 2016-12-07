<?php

namespace Tetris\Numbers;

use Httpful\Http;
use Tetris\Services\ApiService;
use stdClass;


class TKMApi extends ApiService
{
    private $accountCache = [];

    public function listAccounts(string $company, $platform = null): array
    {
        $uri = getenv('TKM_URL') . '/company/' . $company . '/accounts';

        if (!empty($platform)) $uri .= "?platform={$platform}";

        $response = $this->createRequest()
            ->method(Http::GET)
            ->uri($uri)
            ->send();

        return $this->parseArrayBody($this->parseResponse($response));
    }

    public function getAccount(string $accountId): stdClass
    {
        if (empty($this->accountCache[$accountId])) {
            $uri = getenv('TKM_URL') . '/account/' . $accountId;

            $response = $this->createRequest()
                ->method(Http::GET)
                ->uri($uri)
                ->send();

            $this->accountCache[$accountId] = $this->parseObjectBody($this->parseResponse($response));
        }

        return $this->accountCache[$accountId];
    }
}
