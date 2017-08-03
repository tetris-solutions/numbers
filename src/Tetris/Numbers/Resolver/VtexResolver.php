<?php

namespace Tetris\Numbers\Resolver;

use Tetris\Numbers\Report\Query\Query;
use Tetris\Numbers\API\VTEXApi;
use stdClass;

class VtexResolver implements Resolver
{
    /**
     * @var VTEXApi
     */
    private $api;

    function __construct(string $tetrisAccount, stdClass $token)
    {
        $this->api = $api = new VTEXApi(
            $token->environment,
            $token->id,
            $token->user,
            $token->password
        );
    }

    private function breakOnItems(stdClass $order): array
    {
        $items = [];

        foreach ($order->items as $source) {
            $item = new stdClass();

            foreach ($source as $key => $value) {
                $item->{"item_{$key}"} = $value;
            }

            foreach ($order as $key => $value) {
                if ($key !== 'items') {
                    $item->{$key} = $value;
                }
            }

            $items[] = $item;
        }

        return $items;
    }

    function resolve(Query $query, bool $aggregateMode): array
    {
        $result = [];

        foreach ($this->api->listOrders() as $order) {
//            $fullOrder = $this->api->getOrder($order->orderId);

            foreach ($this->breakOnItems($order) as $item) {
                $result[] = $item;
            }
        }

        return $result;
    }
}
