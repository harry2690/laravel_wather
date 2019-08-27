<?php

namespace App\API;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Http\Response;
use Log;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

abstract class BasicApi
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    abstract protected function getCustomerHeaders(): array;

    /**
     * @param       $url
     * @param array $options
     * @return SymfonyResponse
     */
    protected function get($url, $options = [])
    {
        try {
            $options['headers'] = $this->getCustomerHeaders();

            $response = $this->client->get($url, $options);

            $response = $this->response($response);

//            $this->log($url, $response);

            return $response;
        } catch (ConnectException $e) {
            return $this->connectExceptionResponse();
        }
    }

    /**
     * @param       $url
     * @param array $options
     * @return SymfonyResponse
     */
    protected function post($url, $options = [])
    {
        try {
            $options['headers'] = $this->getCustomerHeaders();

            $response = $this->client->post($url, $options);

            $response = $this->response($response);

            $this->log($url, $response);

            return $response;
        } catch (ConnectException $e) {
            return $this->connectExceptionResponse();
        }
    }

    /**
     * @param       $url
     * @param array $options
     * @return SymfonyResponse
     */
    protected function patch($url, $options = [])
    {
        try {
            $options['headers'] = $this->getCustomerHeaders();

            $response = $this->client->patch($url, $options);

            $response = $this->response($response);

            $this->log($url, $response);

            return $response;
        } catch (ConnectException $e) {
            return $this->connectExceptionResponse();
        }
    }

    /**
     * @param       $url
     * @param array $options
     * @return SymfonyResponse
     */
    protected function put($url, $options = [])
    {
        try {
            $options['headers'] = $this->getCustomerHeaders();

            $response = $this->client->put($url, $options);

            $response = $this->response($response);

            $this->log($url, $response);

            return $response;
        } catch (ConnectException $e) {
            return $this->connectExceptionResponse();
        }
    }

    /**
     * @param       $url
     * @param array $options
     * @return SymfonyResponse
     */
    protected function delete($url, $options = [])
    {
        try {
            $options['headers'] = $this->getCustomerHeaders();

            $response = $this->client->delete($url, $options);

            $response = $this->response($response);

            $this->log($url, $response);

            return $response;
        } catch (ConnectException $e) {
            return $this->connectExceptionResponse();
        }
    }

    /**
     * @param ResponseInterface $response
     * @return SymfonyResponse
     */
    protected function response(ResponseInterface $response)
    {
        $content = $response->getBody()->getContents();
        $data    = json_decode($content, true);

        if (json_last_error()) {
            $data = $content;
        }

        return Response::create($data, $response->getStatusCode());
    }

    /**
     * @return SymfonyResponse
     */
    protected function connectExceptionResponse()
    {
        return Response::create([], Response::HTTP_SERVICE_UNAVAILABLE, ['Retry-After' => 120]);
    }

    /**
     * @param string $url
     * @param        $statusCode
     * @param        $content
     */
    private function log(string $url, SymfonyResponse $response)
    {
        Log::info($url, [
            'status_code' => $response->getStatusCode(),
            'content'     => $response->getContent(),
        ]);
    }
}
