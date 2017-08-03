<?php

namespace Tetris\Numbers\Generator\Vtex;

use Tetris\Numbers\Generator\Vtex\Extensions\VtexParser;
use Tetris\Numbers\Generator\Shared\AttributeFactory;
use Tetris\Numbers\Generator\Shared\AttributeTranslator;
use Tetris\Numbers\Generator\Shared\TransientAttribute;

class VtexAttributeFactory extends AttributeFactory
{
    protected $platform = 'Vtex';

    function __construct()
    {
        $this->parser = new VtexParser();

        $toSnakeCase = function ($input): string {
            preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);
            $ret = $matches[0];
            foreach ($ret as &$match) {
                $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
            }
            return implode('_', $ret);
        };

        $dropPrefix = function (string $prefix) use ($toSnakeCase): callable {
            return function (string $name) use ($prefix, $toSnakeCase): string {
                return substr($name, 0, strlen($prefix)) === $prefix
                    ? $toSnakeCase(substr($name, strlen($prefix)))
                    : null;
            };
        };

        $this->translators = [
            new AttributeTranslator('Order', [
                'orderId' => 'id',
                'creationDate' => 'date',
                'item_quantity',
                'item_sellerSku' => 'sku',
                'item_sellingPrice' => 'price',
                'item_name',

                'marketingData.utmSource',
                'marketingData.utmPartner',
                'marketingData.utmMedium',
                'marketingData.coupon',
                'marketingData.utmiCampaign',
                'marketingData.utmipage',
                'marketingData.utmiPart',

                'shippingData.id' => 'shipping_id',
                'shippingData.address.addressType',
                'shippingData.address.receiverName',
                'shippingData.address.addressId',
                'shippingData.address.postalCode',
                'shippingData.address.city',
                'shippingData.address.state',
                'shippingData.address.country',
                'shippingData.address.street',
                'shippingData.address.number',
                'shippingData.address.neighborhood',
                'shippingData.address.complement',
                'shippingData.address.reference',
                'shippingData.trackingHints'
            ], [
                'item_',
                'marketingData.',
                'shippingData.address.'
            ])
        ];
    }

    protected function isMetric(TransientAttribute $attribute, $group): bool
    {
        return $attribute->type === 'integer' || $attribute->type === 'decimal';
    }

    protected function normalizeType(TransientAttribute $attribute, string $originalType, $isSpecialValue, $isPercentage): string
    {
        return $originalType;
    }

    protected function getId(string $entity, string $attributeName): string
    {
        return parent::getId($entity, $attributeName);
    }

    protected function isParsable(TransientAttribute $attribute): bool
    {
        return isset(VtexParser::dateParsers[$attribute->id]);
    }
}
