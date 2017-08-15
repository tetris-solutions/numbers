<?php

namespace Tetris\Numbers\Resolver;

use DateTime;
use Tetris\Numbers\Base\Attribute;
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

    private function splitOverItems(stdClass $order): array
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

            $item->_id_ = $item->orderId . ':' . $item->item_id;
            $items[$item->_id_] = $item;
        }

        return $items;
    }

    private function requiresGet(Query $query): bool
    {
        $dimensions = array_map(function ($id) use ($query) {
            return $query->report->attributes[$id];
        }, $query->dimensions);

        $attributes = array_merge(
            $dimensions,
            array_values($query->metrics)
        );

        /**
         * @var Attribute $attr
         */
        foreach ($attributes as $attr) {
            if ($attr->group === 'get') {
                return true;
            }
        }

        return false;
    }

    private function ordersInPeriod(DateTime $since, DateTime $until): array
    {
        $items = [];

        $orders = $this->api->listOrders($since, $until);

        foreach ($orders as $order) {
            foreach ($this->splitOverItems($order) as $key => $item) {
                $items[$key] = $item;
            }
        }

        return $items;
    }

    function resolve(Query $query, bool $aggregateMode): array
    {
        $items = [];
        $orderIds = $query->filters['id'] ?? [];
        $requiresList = empty($query->filters['id'] ?? null);

        if ($requiresList) {
            $items = $this->ordersInPeriod($query->since, $query->until);

            $orderIds = array_unique(
                array_map(function (stdClass $item): string {
                    return $item->orderId;
                }, $items)
            );
        }
  
        $orders = $this->api->getOrders($orderIds);

        if (!$requiresList || $this->requiresGet($query)) {
            foreach ($orders as $order) {
                $extendedItems = $this->splitOverItems($order);
                
                foreach ($extendedItems as $key => $extendedItem) {
                    $items[$key] = (object)array_merge(
                        (array)$extendedItem,
                        (array)($items[$key] ?? [])
                    );
                }
            }
        }

        return array_values($items);
    }
}
