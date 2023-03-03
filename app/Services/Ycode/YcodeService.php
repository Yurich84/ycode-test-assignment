<?php

namespace App\Services\Ycode;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class YcodeService
 *
 * @method mixed get(string $uri)
 * @method mixed head(string $uri)
 * @method mixed put(string $uri, null|array $data)
 * @method mixed post(string $uri, null|array $data)
 * @method mixed patch(string $uri, null|array $data)
 * @method mixed delete(string $uri)
 *
 */
class YcodeService
{
    private Client $client;

    private string $token;

    public function __construct()
    {
        $this->token = config('ycode.token');
        $this->client = new Client([
            'base_uri' => config('ycode.url'),
        ]);
    }

    /**
     * @param  string  $method
     * @param  array  $arg
     * @return string
     * @throws GuzzleException
     * @throws Exception
     */
    public function __call(string $method, array $arg)
    {
        $url = $arg[0];
        $data = $arg[1] ?? null;
        try {
            return json_decode($this->request($method, $url, $data));
        } catch (RequestException $e) {
            throw new NotFoundHttpException($e->getMessage());
        }
    }

    /**
     * @param  string  $method
     * @param  string  $url
     * @param  array|null  $data
     * @return string
     * @throws GuzzleException
     * @throws Exception
     */
    private function request(string $method, string $url, ?array $data = []): string
    {
        $header = [
            'authorization' => 'Bearer ' . $this->token,
            'accept' => 'application/json'
        ];

        if (in_array($method, ['post', 'pul', 'patch'])) {
            $header['content-type'] = 'application/json';
        }

        $response = $this->client->request($method, $url, [
            'headers' => $header,
            'body' => json_encode($data)
        ]);
        if ($response->getStatusCode() === 200) {
            return $response->getBody()->getContents();
        } else {
            throw new Exception($response->getReasonPhrase());
        }
    }
}
