<?php

declare(strict_types=1);

namespace AmazonPHP\SellingPartner\Api\ApprovalsApi;

use AmazonPHP\SellingPartner\AccessToken;
use AmazonPHP\SellingPartner\Configuration;
use AmazonPHP\SellingPartner\Exception\ApiException;
use AmazonPHP\SellingPartner\Exception\InvalidArgumentException;
use AmazonPHP\SellingPartner\HttpFactory;
use AmazonPHP\SellingPartner\HttpSignatureHeaders;
use AmazonPHP\SellingPartner\ObjectSerializer;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Log\LoggerInterface;

/**
 * Selling Partner API for Orders.
 *
 * The Selling Partner API for Orders helps you programmatically retrieve order information. These APIs let you develop fast, flexible, custom applications in areas like order synchronization, order research, and demand-based decision support tools.
 *
 * The version of the OpenAPI document: v0
 *
 * This class was auto-generated by https://openapi-generator.tech
 * Do not change it, it will be overwritten with next execution of /bin/generate.sh
 */
final class OrdersSDK implements OrdersSDKInterface
{
    public function __construct(private readonly ClientInterface $client, private readonly HttpFactory $httpFactory, private readonly Configuration $configuration, private readonly LoggerInterface $logger)
    {
    }

    /**
     * Operation getOrderItemsApprovals.
     *
     * @param string $order_id An Amazon-defined order identifier, in 3-7-7 format, e.g. 933-1671587-0818628. (required)
     * @param null|string $next_token A string token returned in the response of your previous request. (optional)
     * @param null|\AmazonPHP\SellingPartner\Model\Orders\ItemApprovalType[] $item_approval_types When set, only return approvals for items which approval type is contained in the specified approval types. (optional)
     * @param null|\AmazonPHP\SellingPartner\Model\Orders\ItemApprovalStatus[] $item_approval_status When set, only return approvals that contain items which approval status is contained in the specified approval status. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     */
    public function getOrderItemsApprovals(AccessToken $accessToken, string $region, string $order_id, ?string $next_token = null, ?array $item_approval_types = null, ?array $item_approval_status = null) : \AmazonPHP\SellingPartner\Model\Orders\GetOrderApprovalsResponse
    {
        $request = $this->getOrderItemsApprovalsRequest($accessToken, $region, $order_id, $next_token, $item_approval_types, $item_approval_status);

        $this->configuration->extensions()->preRequest('Orders', 'getOrderItemsApprovals', $request);

        try {
            $correlationId = $this->configuration->idGenerator()->generate();
            $sanitizedRequest = $request;

            foreach ($this->configuration->loggingSkipHeaders() as $sensitiveHeader) {
                $sanitizedRequest = $sanitizedRequest->withoutHeader($sensitiveHeader);
            }

            if ($this->configuration->loggingEnabled('Orders', 'getOrderItemsApprovals')) {
                $this->logger->log(
                    $this->configuration->logLevel('Orders', 'getOrderItemsApprovals'),
                    'Amazon Selling Partner API pre request',
                    [
                        'api' => 'Orders',
                        'operation' => 'getOrderItemsApprovals',
                        'request_correlation_id' => $correlationId,
                        'request_body' => (string) $sanitizedRequest->getBody(),
                        'request_headers' => $sanitizedRequest->getHeaders(),
                        'request_uri' => (string) $sanitizedRequest->getUri(),
                    ]
                );
            }

            $response = $this->client->sendRequest($request);

            $this->configuration->extensions()->postRequest('Orders', 'getOrderItemsApprovals', $request, $response);

            if ($this->configuration->loggingEnabled('Orders', 'getOrderItemsApprovals')) {
                $sanitizedResponse = $response;

                foreach ($this->configuration->loggingSkipHeaders() as $sensitiveHeader) {
                    $sanitizedResponse = $sanitizedResponse->withoutHeader($sensitiveHeader);
                }

                $this->logger->log(
                    $this->configuration->logLevel('Orders', 'getOrderItemsApprovals'),
                    'Amazon Selling Partner API post request',
                    [
                        'api' => 'Orders',
                        'operation' => 'getOrderItemsApprovals',
                        'response_correlation_id' => $correlationId,
                        'response_body' => (string) $sanitizedResponse->getBody(),
                        'response_headers' => $sanitizedResponse->getHeaders(),
                        'response_status_code' => $sanitizedResponse->getStatusCode(),
                        'request_uri' => (string) $sanitizedRequest->getUri(),
                        'request_body' => (string) $sanitizedRequest->getBody(),
                    ]
                );
            }
        } catch (ClientExceptionInterface $e) {
            throw new ApiException(
                "[{$e->getCode()}] {$e->getMessage()}",
                (int) $e->getCode(),
                null,
                null,
                $e
            );
        }

        $statusCode = $response->getStatusCode();

        if ($statusCode < 200 || $statusCode > 299) {
            throw new ApiException(
                \sprintf(
                    '[%d] Error connecting to the API (%s)',
                    $statusCode,
                    (string) $request->getUri()
                ),
                $statusCode,
                $response->getHeaders(),
                (string) $response->getBody()
            );
        }

        return ObjectSerializer::deserialize(
            $this->configuration,
            (string) $response->getBody(),
            '\AmazonPHP\SellingPartner\Model\Orders\GetOrderApprovalsResponse',
            []
        );
    }

    /**
     * Create request for operation 'getOrderItemsApprovals'.
     *
     * @param string $order_id An Amazon-defined order identifier, in 3-7-7 format, e.g. 933-1671587-0818628. (required)
     * @param null|string $next_token A string token returned in the response of your previous request. (optional)
     * @param null|\AmazonPHP\SellingPartner\Model\Orders\ItemApprovalType[] $item_approval_types When set, only return approvals for items which approval type is contained in the specified approval types. (optional)
     * @param null|\AmazonPHP\SellingPartner\Model\Orders\ItemApprovalStatus[] $item_approval_status When set, only return approvals that contain items which approval status is contained in the specified approval status. (optional)
     *
     * @throws \AmazonPHP\SellingPartner\Exception\InvalidArgumentException
     */
    public function getOrderItemsApprovalsRequest(AccessToken $accessToken, string $region, string $order_id, ?string $next_token = null, ?array $item_approval_types = null, ?array $item_approval_status = null) : RequestInterface
    {
        // verify the required parameter 'order_id' is set
        if ($order_id === null || (\is_array($order_id) && \count($order_id) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $order_id when calling getOrderItemsApprovals'
            );
        }

        if ($item_approval_types !== null && \count($item_approval_types) > 1) {
            throw new InvalidArgumentException('invalid value for "$item_approval_types" when calling ApprovalsApi.getOrderItemsApprovals, number of items must be less than or equal to 1.');
        }

        if ($item_approval_status !== null && \count($item_approval_status) > 6) {
            throw new InvalidArgumentException('invalid value for "$item_approval_status" when calling ApprovalsApi.getOrderItemsApprovals, number of items must be less than or equal to 6.');
        }

        $resourcePath = '/orders/v0/orders/{orderId}/approvals';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $multipart = false;
        $query = '';

        // query params
        if (\is_array($next_token)) {
            $next_token = ObjectSerializer::serializeCollection($next_token, '', true);
        }

        if ($next_token !== null) {
            $queryParams['NextToken'] = ObjectSerializer::toString($next_token);
        }
        // query params
        if (\is_array($item_approval_types)) {
            $item_approval_types = ObjectSerializer::serializeCollection($item_approval_types, 'form', true);
        }

        if ($item_approval_types !== null) {
            $queryParams['ItemApprovalTypes'] = ObjectSerializer::toString($item_approval_types);
        }
        // query params
        if (\is_array($item_approval_status)) {
            $item_approval_status = ObjectSerializer::serializeCollection($item_approval_status, 'form', true);
        }

        if ($item_approval_status !== null) {
            $queryParams['ItemApprovalStatus'] = ObjectSerializer::toString($item_approval_status);
        }

        if (\count($queryParams)) {
            $query = \http_build_query($queryParams);
        }

        // path params
        if ($order_id !== null) {
            $resourcePath = \str_replace(
                '{' . 'orderId' . '}',
                ObjectSerializer::toPathValue($order_id),
                $resourcePath
            );
        }

        if ($multipart) {
            $headers = [
                'accept' => ['application/json'],
                'host' => [$this->configuration->apiHost($region)],
                'user-agent' => [$this->configuration->userAgent()],
            ];
        } else {
            $headers = [
                'content-type' => ['application/json'],
                'accept' => ['application/json'],
                'host' => [$this->configuration->apiHost($region)],
                'user-agent' => [$this->configuration->userAgent()],
            ];
        }

        $request = $this->httpFactory->createRequest(
            'GET',
            $this->configuration->apiURL($region) . $resourcePath . '?' . $query
        );

        // for model (json/xml)
        if (\count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];

                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = \is_array($formParamValue) ? $formParamValue : [$formParamValue];

                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem,
                        ];
                    }
                }
                $request = $request->withParsedBody($multipartContents);
            } elseif ($headers['content-type'] === ['application/json']) {
                $request = $request->withBody($this->httpFactory->createStreamFromString(\json_encode($formParams, JSON_THROW_ON_ERROR)));
            } else {
                $request = $request->withParsedBody($formParams);
            }
        }

        foreach (\array_merge($headerParams, $headers) as $name => $header) {
            $request = $request->withHeader($name, $header);
        }

        return HttpSignatureHeaders::forConfig(
            $this->configuration,
            $accessToken,
            $region,
            $request
        );
    }

    /**
     * Operation updateOrderItemsApprovals.
     *
     * @param string $order_id An Amazon-defined order identifier, in 3-7-7 format. (required)
     * @param \AmazonPHP\SellingPartner\Model\Orders\UpdateOrderApprovalsRequest $payload The request body for the updateOrderItemsApprovals operation. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     */
    public function updateOrderItemsApprovals(AccessToken $accessToken, string $region, string $order_id, \AmazonPHP\SellingPartner\Model\Orders\UpdateOrderApprovalsRequest $payload)
    {
        $request = $this->updateOrderItemsApprovalsRequest($accessToken, $region, $order_id, $payload);

        $this->configuration->extensions()->preRequest('Orders', 'updateOrderItemsApprovals', $request);

        try {
            $correlationId = $this->configuration->idGenerator()->generate();
            $sanitizedRequest = $request;

            foreach ($this->configuration->loggingSkipHeaders() as $sensitiveHeader) {
                $sanitizedRequest = $sanitizedRequest->withoutHeader($sensitiveHeader);
            }

            if ($this->configuration->loggingEnabled('Orders', 'updateOrderItemsApprovals')) {
                $this->logger->log(
                    $this->configuration->logLevel('Orders', 'updateOrderItemsApprovals'),
                    'Amazon Selling Partner API pre request',
                    [
                        'api' => 'Orders',
                        'operation' => 'updateOrderItemsApprovals',
                        'request_correlation_id' => $correlationId,
                        'request_body' => (string) $sanitizedRequest->getBody(),
                        'request_headers' => $sanitizedRequest->getHeaders(),
                        'request_uri' => (string) $sanitizedRequest->getUri(),
                    ]
                );
            }

            $response = $this->client->sendRequest($request);

            $this->configuration->extensions()->postRequest('Orders', 'updateOrderItemsApprovals', $request, $response);

            if ($this->configuration->loggingEnabled('Orders', 'updateOrderItemsApprovals')) {
                $sanitizedResponse = $response;

                foreach ($this->configuration->loggingSkipHeaders() as $sensitiveHeader) {
                    $sanitizedResponse = $sanitizedResponse->withoutHeader($sensitiveHeader);
                }

                $this->logger->log(
                    $this->configuration->logLevel('Orders', 'updateOrderItemsApprovals'),
                    'Amazon Selling Partner API post request',
                    [
                        'api' => 'Orders',
                        'operation' => 'updateOrderItemsApprovals',
                        'response_correlation_id' => $correlationId,
                        'response_body' => (string) $sanitizedResponse->getBody(),
                        'response_headers' => $sanitizedResponse->getHeaders(),
                        'response_status_code' => $sanitizedResponse->getStatusCode(),
                        'request_uri' => (string) $sanitizedRequest->getUri(),
                        'request_body' => (string) $sanitizedRequest->getBody(),
                    ]
                );
            }
        } catch (ClientExceptionInterface $e) {
            throw new ApiException(
                "[{$e->getCode()}] {$e->getMessage()}",
                (int) $e->getCode(),
                null,
                null,
                $e
            );
        }

        $statusCode = $response->getStatusCode();

        if ($statusCode < 200 || $statusCode > 299) {
            throw new ApiException(
                \sprintf(
                    '[%d] Error connecting to the API (%s)',
                    $statusCode,
                    (string) $request->getUri()
                ),
                $statusCode,
                $response->getHeaders(),
                (string) $response->getBody()
            );
        }

        return null;
    }

    /**
     * Create request for operation 'updateOrderItemsApprovals'.
     *
     * @param string $order_id An Amazon-defined order identifier, in 3-7-7 format. (required)
     * @param \AmazonPHP\SellingPartner\Model\Orders\UpdateOrderApprovalsRequest $payload The request body for the updateOrderItemsApprovals operation. (required)
     *
     * @throws \AmazonPHP\SellingPartner\Exception\InvalidArgumentException
     */
    public function updateOrderItemsApprovalsRequest(AccessToken $accessToken, string $region, string $order_id, \AmazonPHP\SellingPartner\Model\Orders\UpdateOrderApprovalsRequest $payload) : RequestInterface
    {
        // verify the required parameter 'order_id' is set
        if ($order_id === null || (\is_array($order_id) && \count($order_id) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $order_id when calling updateOrderItemsApprovals'
            );
        }
        // verify the required parameter 'payload' is set
        if ($payload === null || (\is_array($payload) && \count($payload) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $payload when calling updateOrderItemsApprovals'
            );
        }

        $resourcePath = '/orders/v0/orders/{orderId}/approvals';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $multipart = false;
        $query = '';

        if (\count($queryParams)) {
            $query = \http_build_query($queryParams);
        }

        // path params
        if ($order_id !== null) {
            $resourcePath = \str_replace(
                '{' . 'orderId' . '}',
                ObjectSerializer::toPathValue($order_id),
                $resourcePath
            );
        }

        if ($multipart) {
            $headers = [
                'accept' => ['application/json'],
                'host' => [$this->configuration->apiHost($region)],
                'user-agent' => [$this->configuration->userAgent()],
            ];
        } else {
            $headers = [
                'content-type' => ['application/json'],
                'accept' => ['application/json'],
                'host' => [$this->configuration->apiHost($region)],
                'user-agent' => [$this->configuration->userAgent()],
            ];
        }

        $request = $this->httpFactory->createRequest(
            'POST',
            $this->configuration->apiURL($region) . $resourcePath . '?' . $query
        );

        // for model (json/xml)
        if (isset($payload)) {
            if ($headers['content-type'] === ['application/json']) {
                $httpBody = \json_encode(ObjectSerializer::sanitizeForSerialization($payload), JSON_THROW_ON_ERROR);
            } else {
                $httpBody = $payload;
            }

            $request = $request->withBody($this->httpFactory->createStreamFromString($httpBody));
        } elseif (\count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];

                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = \is_array($formParamValue) ? $formParamValue : [$formParamValue];

                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem,
                        ];
                    }
                }
                $request = $request->withParsedBody($multipartContents);
            } elseif ($headers['content-type'] === ['application/json']) {
                $request = $request->withBody($this->httpFactory->createStreamFromString(\json_encode($formParams, JSON_THROW_ON_ERROR)));
            } else {
                $request = $request->withParsedBody($formParams);
            }
        }

        foreach (\array_merge($headerParams, $headers) as $name => $header) {
            $request = $request->withHeader($name, $header);
        }

        return HttpSignatureHeaders::forConfig(
            $this->configuration,
            $accessToken,
            $region,
            $request
        );
    }
}
