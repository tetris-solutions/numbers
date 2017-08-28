<?php

namespace Tetris\Numbers\API;

use Slim\Http\Uri;
use Tetris\Exceptions\ApiException;
use stdClass;

use GuzzleHttp\Pool as GuzzlePool;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use GuzzleHttp\Psr7\Response as GuzzleResponse;

class VTEXApi
{
    public $name;
    public $environment;
    public $user;
    public $password;
    public $client;

    function __construct(string $environment, string $name, string $user, string $password)
    {
        $this->environment = $environment;
        $this->name = $name;
        $this->user = $user;
        $this->password = $password;
        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'X-VTEX-API-AppKey' => $user,
            'X-VTEX-API-AppToken' => $password
        ];
        $uri = "http://{$this->name}.{$this->environment}.com.br/api/oms/pvt/orders";
        $this->client = new GuzzleClient(['headers' => $headers, 'base_uri' => $uri]);
    }

    /**
     * @param GuzzleResponse $response
     * @return \stdClass
     * @throws ApiException
     */
    private function parseObjectBody(GuzzleResponse $response): \stdClass
    {
        $body = json_decode($response->getBody()->getContents());

        if (empty($body) || $body instanceof \stdClass === FALSE) {
            throw new ApiException('Desculpe, mas os servidores Vtex estão instáveis. Tente novamente mais tarde.');
        }
        return $body;
    }

    /**
     * @param GuzzleResponse $response
     * @return GuzzleResponse
     * @throws ApiException
     */
    private function parseResponse(GuzzleResponse $response): GuzzleResponse
    {
        if ($response->getStatusCode() !== 200) {
            throw new ApiException('Desculpe, mas os servidores Vtex estão instáveis. Tente novamente mais tarde.');
        }

        return $response;
    }

    function listOrders(\DateTime $start, \DateTime $end, $orderIds = []): array
    {
        $from = $start->format('Y-m-d') . 'T00:00:00.000Z';
        $to = $end->format('Y-m-d') . 'T23:59:59.000Z';

        $query = [
            'f_creationDate' => "creationDate:[{$from} TO {$to}]",
            'utc' => '-0300',
            'per_page' => '100',
            'page' => 1
        ];

        $firstResponse = $this->client->request('GET', '', ['query' => $query]);

        $auxObj = $this->parseObjectBody($this->parseResponse($firstResponse));
        $result = $auxObj->list;
        $totalPages = $auxObj->paging->pages;

        $requests = function () use (&$query, &$totalPages) {
            do {
                $query['page']++;
                yield new GuzzleRequest('GET', "?f_creationDate={$query['f_creationDate']}&per_page={$query['per_page']}&page={$query['page']}&utc={$query['utc']}");
            } while ($query['page'] < $totalPages);
        };
        $pool = new GuzzlePool($this->client, $requests(), [
            'concurrency' => 50,
            'fulfilled' => function ($response, $index) use (&$result) {
                // this is delivered each successful response
                $result = array_merge($result, $this->parseObjectBody($this->parseResponse($response))->list);
            },
            'rejected' => function ($reason, $index) {
                throw new ApiException('Desculpe, mas os servidores Vtex estão instáveis. Tente novamente mais tarde.');
            }
        ]);

        // Initiate the transfers and create a promise
        $promise = $pool->promise();
        // Force the pool of requests to complete.
        $promise->wait();

        return $result;
    }

    function getOrder(string $orderId): stdClass
    {
        $response = $this->client->request('GET', 'orders/' . $orderId);
        return $this->parseObjectBody($this->parseResponse($response));
    }

    function getOrders(array $orderIds): array
    {
        $result = [];
        $requests = function () use (&$orderIds) {
            foreach ($orderIds as $orderId) {
                yield new GuzzleRequest('GET', 'orders/' . $orderId);
            }
        };
        $pool = new GuzzlePool($this->client, $requests(), [
            'concurrency' => 50,
            'fulfilled' => function ($response, $index) use (&$orderIds, &$result) {
                // this is delivered each successful response
                array_push($result, $this->parseObjectBody($this->parseResponse($response)));
            },
            'rejected' => function ($reason, $index) {
                throw new ApiException('Desculpe, mas os servidores Vtex estão instáveis. Tente novamente mais tarde.');
            }
        ]);

        // Initiate the transfers and create a promise
        $promise = $pool->promise();
        // Force the pool of requests to complete.
        $promise->wait();

        return $result;
    }
}
