<?php

namespace Tetris\Numbers\Resolver;

use Tetris\Numbers\Base\Attribute;
use Tetris\Numbers\Report\MetaData\MetaDataV2;
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

            $item->_id_ = $item->orderId . ':' . $item->item_id;
            $items[$item->_id_] = $item;
        }

        return $items;
    }

    function resolve(Query $query, bool $aggregateMode): array
    {
        $requiresGet = false;

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
                $requiresGet = true;
                break;
            }
        }

        $orders = $this->api->listOrders(
            $query->since,
            $query->until,
            $query->filters['ids']
        );

        $items = [];

        foreach ($orders as $order) {
            foreach ($this->breakOnItems($order) as $key => $item) {
                $items[$key] = $item;
            }
        }

        $orderIds = [];

        if ($requiresGet) {
            foreach ($items as $item) {
                if (in_array($orderIds, $item->orderId)) continue;

                $extendedItems = $this->breakOnItems(
                    $this->api->getOrder($item->orderId)
                );

                foreach ($extendedItems as $key => $extendedItem) {
                    $items[$key] = (object)array_merge(
                        (array)$extendedItem,
                        (array)($items[$key] ?? [])
                    );
                }

                $orderIds[] = $item->orderId;
            }


        }

        return array_values($items);
    }
}
