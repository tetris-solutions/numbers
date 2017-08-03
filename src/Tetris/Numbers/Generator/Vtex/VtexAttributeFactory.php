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
                'item_sellerSku',
                'item_price',
//                'item_seller',
//                'item_description',
//                'item_ean',
//                'item_refId',
//                'item_id',
//                'item_productId',
//                'item_sellingPrice',
//                'item_uniqueId',
//                'item_lockId',
//                'item_name',
//                'item_listPrice',
//                'item_manualPrice',
//                'item_imageUrl',
//                'item_detailUrl',
//                'item_sellerSku',
//                'item_priceValidUntil',
//                'item_commission',
//                'item_tax',
//                'item_preSaleDate',
//                'item_measurementUnit',
//                'item_unitMultiplier',
//                'item_isGift',
//                'item_shippingPrice',
//                'item_rewardValue',

                'marketingData.utmSource',
                'marketingData.utmPartner',
                'marketingData.utmMedium',
                'marketingData.coupon',
                'marketingData.utmiCampaign',
                'marketingData.utmipage',
                'marketingData.utmiPart'
            ], ['item_', 'marketingData.'])
        ];
    }

    protected function isMetric(TransientAttribute $attribute, $behaviorOrGroup): bool
    {
        return $behaviorOrGroup === 'METRIC';
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
