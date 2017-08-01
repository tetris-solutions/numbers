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

    private function mockResult(): array {
        return [json_decode('{"orderId":"v11036006rihp-01","sequence":"11036006","marketplaceOrderId":"","marketplaceServicesEndpoint":"http://portal.vtexcommerce.com.br/api/oms?an=rihappy","sellerOrderId":"00-v11036006rihp-01","origin":"Marketplace","affiliateId":"","salesChannel":"1","merchantName":null,"status":"invoiced","statusDescription":"Faturado","value":31998,"creationDate":"2017-07-03T11:14:25.5464061+00:00","lastChange":"2017-07-04T17:34:39.9575069+00:00","orderGroup":"v11036006rihp","totals":[{"id":"Items","name":"Total dos Itens","value":31998},{"id":"Discounts","name":"Total dos Descontos","value":0},{"id":"Shipping","name":"Total do Frete","value":0},{"id":"Tax","name":"Total da Taxa","value":0}],"items":[{"uniqueId":"EA6E18EB8AF84860ADA607E2F7AF22DE","id":"100135458","productId":"100135683","ean":null,"lockId":"00-v11036006rihp-01","itemAttachment":{"content":{},"name":null},"attachments":[],"quantity":2,"seller":"1","name":"Boneca Baby Alive - Loira - Cuida de Mim - C2691 - Hasbro","refId":"100135458","price":15999,"listPrice":22999,"manualPrice":null,"priceTags":[{"name":"discount@shipping-discount_rihappy_102#0a43e11d-7094-4af7-b8d5-2897a3931894","value":-1184,"isPercentual":false,"identifier":"discount_rihappy_102"}],"imageUrl":"http://rihappy.vteximg.com.br/arquivos/ids/327999-90-90/boneca-baby-alive-loira-cuida-de-mim-hasbro-C2691_frente.jpg","detailUrl":"/boneca-baby-alive-loira-cuida-de-mim-hasbro/p","components":[],"bundleItems":[],"params":[],"offerings":[],"sellerSku":"100135458","priceValidUntil":null,"commission":0,"tax":0,"preSaleDate":null,"additionalInfo":{"brandName":"Hasbro","brandId":"2000124","categoriesIds":"/738/758/839/","productClusterId":"172,243,265,280,345,423,428,436,465,487,488,490,495,514,777,882,985,1073,1281,1436,1535,1568,1611,1696,1700,1721,1741","commercialConditionId":"1","dimension":{"cubicweight":1.7519,"height":36.0000,"length":10.2000,"weight":880.0000,"width":22.9000},"offeringInfo":null,"offeringType":null,"offeringTypeId":null},"measurementUnit":"un","unitMultiplier":1.0000,"sellingPrice":15999,"isGift":false,"shippingPrice":null,"rewardValue":0}],"marketplaceItems":[],"clientProfileData":{"id":"clientProfileData","email":"fabiana_portofino@hotmail.com-11b.ct.vtex.com.br","firstName":"Fabiana","lastName":"Cardoso da Silva Simoes","documentType":"cpf","document":"27801857836","phone":"+5511981644149","corporateName":null,"tradeName":null,"corporateDocument":null,"stateInscription":null,"corporatePhone":null,"isCorporate":false,"userProfileId":"8539d64d-6181-4635-9a85-0f62e58dcf7e","customerClass":null},"giftRegistryData":null,"marketingData":{"id":"marketingData","utmSource":"google","utmPartner":null,"utmMedium":"cpc","utmCampaign":"institucional_saopaulo_especifica_3yz","coupon":null,"utmiCampaign":"","utmipage":"","utmiPart":"","marketingTags":[]},"ratesAndBenefitsData":{"id":"ratesAndBenefitsData","rateAndBenefitsIdentifiers":[{"description":"Frete Gratis Sul e Sudeste","featured":true,"id":"discount_rihappy_102","name":"Frete Gratis Sul e Sudeste"}]},"shippingData":{"id":"shippingData","address":{"addressType":"residential","receiverName":"Fabiana","addressId":"condominio","postalCode":"09895400","city":"SAO BERNARDO DO CAMPO","state":"SP","country":"BRA","street":"AV D JAIME DE B CAMARA","number":"675","neighborhood":"PLANALTO","complement":"111 C","reference":"km 21 da Anchieta sentido baixada"},"logisticsInfo":[{"itemIndex":0,"selectedSla":"Normal","lockTTL":"8d","price":0,"listPrice":1184,"sellingPrice":0,"deliveryWindow":null,"deliveryCompany":"Total_ Express","shippingEstimate":"7bd","shippingEstimateDate":"2017-07-12T08:15:09.8474232+00:00","slas":[{"id":"Normal","name":"Normal","shippingEstimate":"7bd","deliveryWindow":null,"price":0,"deliveryChannel":null},{"id":"Entrega Agendada","name":"Entrega Agendada","shippingEstimate":"20bd","deliveryWindow":null,"price":0,"deliveryChannel":null}],"shipsTo":["BRA"],"deliveryIds":[{"courierId":"200","courierName":"Total_ Express","dockId":"17eb7c6","quantity":2,"warehouseId":"3"}],"deliveryChannel":null}],"trackingHints":null},"paymentData":{"transactions":[{"isActive":true,"transactionId":"F0085A2032B145FFAF2535FB258252B8","payments":[{"id":"0C1DC49215484E7EBF57E0BB5DDAC098","paymentSystem":"1","paymentSystemName":"American Express","value":31998,"installments":1,"referenceValue":31998,"cardHolder":null,"cardNumber":null,"firstDigits":"376481","lastDigits":"2008","cvv2":null,"expireMonth":null,"expireYear":null,"url":null,"giftCardId":null,"giftCardName":null,"giftCardCaption":null,"redemptionCode":null,"group":"creditCard","tid":"10388851306H2PO1LVHB","dueDate":null,"connectorResponses":{"Tid":"10388851306H2PO1LVHB","ReturnCode":"0","Message":"Sucesso","authId":"643778","Nsu":"340737","Arp":"643778","eci":"7","lr":"00"}}]}]},"packageAttachment":{"packages":[{"items":[{"itemIndex":0,"quantity":2,"price":15999,"description":null}],"courier":"TEX COURIER S.A.","invoiceNumber":"643797","invoiceValue":31998,"invoiceUrl":"http://www.nfe.fazenda.gov.br/portal/consulta.aspx?tipoConsulta=completa","issuanceDate":"2017-07-04T13:29:06.6370000+00:00","trackingNumber":"834","invoiceKey":"31170758731662018088550010006437971006437976","trackingUrl":"http://tracking.totalexpress.com.br/poupup_track.php?reid=834&pedido=11036006&nfiscal=643797","embeddedInvoice":"","type":"Output","courierStatus":{"status":"ok","finished":true,"data":[{"lastChange":"2017-07-05T15:44:00.0000000+00:00","city":"","state":"","description":"ENTREGA REALIZADA"},{"lastChange":"2017-07-05T07:44:33.0000000+00:00","city":"","state":"","description":"PROCESSO DE ENTREGA"},{"lastChange":"2017-07-05T04:23:21.0000000+00:00","city":"","state":"","description":"SEPARADO PARA O ROTEIRO DE ENTREGA"},{"lastChange":"2017-07-05T03:05:55.0000000+00:00","city":"Paulo","state":"SP","description":"RECEBIDO NO CENTRO DE DISTRIBUIÇÃO São Paulo/SP"},{"lastChange":"2017-07-04T23:49:36.0000000+00:00","city":"","state":"","description":"TRANSFERENCIA PARA /"},{"lastChange":"2017-07-04T20:57:10.0000000+00:00","city":"","state":"","description":"RECEBIDO NO CENTRO DE DISTRIBUIÇÃO"},{"lastChange":"2017-07-04T20:51:27.0000000+00:00","city":"","state":"","description":"RECEBIDO NO CENTRO DE DISTRIBUIÇÃO"}]}}]},"sellers":[{"id":"1","name":"RiHappy","logo":""}],"callCenterOperatorData":null,"followUpEmail":"9e4da5977365481c956ec19029428ae0@ct.vtex.com.br","lastMessage":null,"hostname":"rihappy","changesAttachment":null,"openTextField":null,"roundingError":0,"orderFormId":"63206cba707144fd8b8b23e7274d7ba0","commercialConditionData":null,"isCompleted":true,"customData":null}', true)];
    }

    private function breakOnItems (array $orders) : array {
        $items = [];
        foreach ($orders as $order) {
            foreach ($order['items'] as $item) {
                $record = array_merge($item, $order);
                unset($record['items']);
                $items[] = $record;
            }
        }
        return $items;
    }
    function resolve(Query $query, bool $aggregateMode): array
    {
        return $this->breakOnItems($this->mockResult());
    }
}
