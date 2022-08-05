<?php

namespace Mlsapi\Mlsapi;

use GuzzleHttp\Client as HttpClient;
use Psr\Http\Message\ResponseInterface;

class Api
{
    protected $httpClient = null;

    protected $token = null;

    protected $resource = null;

    public function __construct(array $options = array())
    {
        $options['base_uri'] = 'https://mlssoccerapi.com';
        $options['headers']['Content-Type'] = 'application/json';
        $this->httpClient = new HttpClient($options);
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function setResource($resource)
    {
        $this->resource = $resource;
        return $this;
    }

    /**
     * Login
     * @param string $username
     * @param string $password
     * 
     * @return Array
     * @throws GuzzleException
     * 
     */
    public function authentication($username, $password)
    {
        $data = $this->request('POST', '/login', [
            'username' => $username,
            'password' => $password
        ]);

        $this->token = $data['Document'];
        return $data;
    }

    /**
     * Get resource by id
     * @param string $id the resource id
     * @return Array
     * @throws GuzzleException
     */
    public function getById($id)
    {
        return $this->request('GET', "/{$this->resource}/{$id}");
    }

    /**
     * Get all resources
     * @return Array
     * @throws GuzzleException
     */
    public function getAll()
    {
        return $this->request('GET', "/{$this->resource}");
    }


    /**
     * Create a resource
     * @return Array
     * @throws GuzzleException
     */
    public function create(array $data)
    {
        return $this->request('POST', "/{$this->resource}", $data);
    }

    /**
     * Update a resource by id
     * 
     * @param string $id
     * @param array $data
     * @return Array
     * 
     * @throws GuzzleException
     */
    public function updateById($id, array $data)
    {
        return $this->request('PUT', "/{$this->resource}/{$id}", $data);
    }

    /**
     * Delete a resouce by id
     * 
     * @param string $id
     * @return Array
     * @throws GuzzleException
     */
    public function deleteById($id)
    {
        return $this->request("DELETE", "/{$this->resource}/{$id}");
    }

    /**
     * @return Array
     * @throws GuzzleException
     */
    protected function request($method, $uri, $data = array())
    {
        $config = [
            'headers' => [
                'Authorization' => "Bearer {$this->token}"
            ]
        ];
        if ($data) {
            $config['json'] = $data;
        }
        $response = $this->httpClient->request($method, $uri, $config);
        return json_decode($response->getBody(), true);
    }
}
