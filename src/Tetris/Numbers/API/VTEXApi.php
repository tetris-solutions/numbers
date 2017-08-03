<?php

namespace Tetris\Numbers\API;

use Httpful\Http;
use Slim\Http\Uri;
use Tetris\Exceptions\ApiException;
use stdClass;
use Httpful\Request as HttpRequest;
use Httpful\Response as HttpResponse;

class VTEXApi
{
    public $name;
    public $environment;
    public $user;
    public $password;

    function __construct(string $environment, string $name, string $user, string $password)
    {
        $this->environment = $environment;
        $this->name = $name;
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * @param HttpResponse $response
     * @return array
     * @throws ApiException
     */
    private function parseArrayBody(HttpResponse $response): array
    {
        if (!isset($response->body) || !is_array($response->body)) {
            throw new ApiException($response);
        }
        return $response->body;
    }

    /**
     * @param HttpResponse $response
     * @return \stdClass
     * @throws ApiException
     */
    private function parseObjectBody(HttpResponse $response): \stdClass
    {
        if (empty($response->body) || $response->body instanceof \stdClass === FALSE) {
            throw new ApiException($response);
        }
        return $response->body;
    }

    /**
     * @param HttpResponse $response
     * @return HttpResponse
     * @throws ApiException
     */
    private function parseResponse(HttpResponse $response): HttpResponse
    {
        if ($response->code !== 200) {
            throw new ApiException($response);
        }

        return $response;
    }

    function listOrders(\DateTime $start, \DateTime $end, $orderIds = []): array
    {
        $from = $start->format('Y-m-d') . 'T00:00:00.000Z';
        $to = $end->format('Y-m-d') . 'T23:59:59.000Z';

        $uri = "http://{$this->name}.{$this->environment}.com.br/api/oms/pvt/orders?" .
            'f_creationDate=creationDate' . urlencode(":[{$from} TO {$to}]");

        $response = HttpRequest::init()
            ->method(Http::GET)
            ->addHeader('Accept', 'application/json')
            ->addHeader('Content-Type', 'application/json')
            ->addHeader('X-VTEX-API-AppKey', $this->user)
            ->addHeader('X-VTEX-API-AppToken', $this->password)
            ->uri($uri)
            ->send();

        return $this->parseObjectBody($this->parseResponse($response))->list;
    }

    function getOrder(string $orderId): stdClass
    {
        $uri = "http://{$this->name}.{$this->environment}.com.br/api/oms/pvt/orders/{$orderId}";

        $response = HttpRequest::init()
            ->method(Http::GET)
            ->addHeader('Accept', 'application/json')
            ->addHeader('Content-Type', 'application/json')
            ->addHeader('X-VTEX-API-AppKey', $this->user)
            ->addHeader('X-VTEX-API-AppToken', $this->password)
            ->uri($uri)
            ->send();

        return $this->parseObjectBody($this->parseResponse($response));
    }
}
