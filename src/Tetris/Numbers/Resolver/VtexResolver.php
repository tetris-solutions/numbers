<?php

namespace Tetris\Numbers\Resolver;

use Tetris\Exceptions\SafeException;
use Tetris\Numbers\Report\Query\Query;
use Throwable;
use stdClass;

class VtexResolver implements Resolver
{
    private $tetrisAccount;
    private $client;
    private $analytics;
    private $reporting;

    function __construct(string $tetrisAccount, stdClass $token)
    {
        $this->tetrisAccount = $tetrisAccount;
    }

    function resolve(Query $query, bool $aggregateMode): array
    {
        return [[
            "orderId" => "v11128126rihp-01",
            "creationDate" => "2017-08-01T16:19:34.0000000+00:00",
            "clientName" => "vanessa ramos",
            "items" => [
                [
                    "seller" => "1",
                    "quantity" => 1,
                    "description" => "Trava de Segurança para Janela - Girotondo Baby",
                    "ean" => null,
                    "refId" => "100124295",
                    "id" => "100124295",
                    "productId" => "100124655",
                    "sellingPrice" => 390,
                    "price" => 390
                ]
            ],
            "totalValue" => 1106,
            "paymentNames" => "Visa",
            "status" => "order-completed",
            "statusDescription" => "Pedido completo",
            "marketPlaceOrderId" => null,
            "sequence" => "11128126",
            "salesChannel" => "1",
            "affiliateId" => "",
            "origin" => "Marketplace",
            "workflowInErrorState" => false,
            "workflowInRetry" => false,
            "lastMessageUnread" => null,
            "ShippingEstimatedDate" => null,
            "orderIsComplete" => true,
            "listId" => null,
            "listType" => null,
            "authorizedDate" => null
        ]];
    }
}
