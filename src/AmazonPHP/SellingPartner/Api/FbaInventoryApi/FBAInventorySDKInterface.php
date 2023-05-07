<?php declare(strict_types=1);

namespace AmazonPHP\SellingPartner\Api\FbaInventoryApi;

use AmazonPHP\SellingPartner\AccessToken;
use AmazonPHP\SellingPartner\Exception\ApiException;
use AmazonPHP\SellingPartner\Exception\InvalidArgumentException;

/**
 * Selling Partner API for FBA Inventory.
 *
 * The Selling Partner API for FBA Inventory lets you programmatically retrieve information about inventory in Amazon's fulfillment network.
 *
 * The version of the OpenAPI document: v1
 *
 * This class was auto-generated by https://openapi-generator.tech
 * Do not change it, it will be overwritten with next execution of /bin/generate.sh
 */
interface FBAInventorySDKInterface
{
    public const API_NAME = 'FBAInventory';

    public const OPERATION_GETINVENTORYSUMMARIES = 'getInventorySummaries';

    public const OPERATION_GETINVENTORYSUMMARIES_PATH = '/fba/inventory/v1/summaries';

    /**
     * Operation getInventorySummaries.
     *
     * @param string $granularity_type The granularity type for the inventory aggregation level. (required)
     * @param string $granularity_id The granularity ID for the inventory aggregation level. (required)
     * @param string[] $marketplace_ids The marketplace ID for the marketplace for which to return inventory summaries. (required)
     * @param bool $details true to return inventory summaries with additional summarized inventory details and quantities. Otherwise, returns inventory summaries only (default value). (optional, default to false)
     * @param null|\DateTimeInterface $start_date_time A start date and time in ISO8601 format. If specified, all inventory summaries that have changed since then are returned. You must specify a date and time that is no earlier than 18 months prior to the date and time when you call the API. Note: Changes in inboundWorkingQuantity, inboundShippedQuantity and inboundReceivingQuantity are not detected. (optional)
     * @param null|string[] $seller_skus A list of seller SKUs for which to return inventory summaries. You may specify up to 50 SKUs. (optional)
     * @param null|string $seller_sku A single seller SKU used for querying the specified seller SKU inventory summaries. (optional)
     * @param null|string $next_token String token returned in the response of your previous request. The string token will expire 30 seconds after being created. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     */
    public function getInventorySummaries(AccessToken $accessToken, string $region, string $granularity_type, string $granularity_id, array $marketplace_ids, bool $details = false, ?\DateTimeInterface $start_date_time = null, ?array $seller_skus = null, ?string $seller_sku = null, ?string $next_token = null) : \AmazonPHP\SellingPartner\Model\FBAInventory\GetInventorySummariesResponse;
}
