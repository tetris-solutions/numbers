<?php

namespace Tetris\Numbers;

use Httpful\Http;
use Tetris\Services\ApiService;
use stdClass;


class TKMApi extends ApiService
{
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

    public function getAccount(string $account): stdClass
    {
        $uri = getenv('TKM_URL') . '/account/' . $account;

        $response = $this->createRequest()
            ->method(Http::GET)
            ->uri($uri)
            ->send();

        return $this->parseObjectBody($this->parseResponse($response));
    }
}
