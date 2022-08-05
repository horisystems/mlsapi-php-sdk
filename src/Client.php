<?php

namespace Mlsapi\Mlsapi;

class Client
{
    protected $api = null;

    public static function init($config = [])
    {
        $api = new Api($config);
        return new self($api);
    }

    public static function initWithToken($token, $config = [])
    {
        $api = new Api($config);
        $api->setToken($token);
        return new self($api);
    }

    protected function __construct(Api $api)
    {
        $this->api = $api;
    }

    public function authentication($username, $password)
    {
        return $this->api->authentication($username, $password);
    }

    /**
     * @return Api
     */
    public function hist()
    {
        return $this->api->setResource('hist');
    }

    /**
     * @return Api
     */
    public function rtd()
    {
        return $this->api->setResource('rtd');
    }

    /**
     * @return Api
     */
    public function players()
    {
        return $this->api->setResource('players');
    }

    /**
     * @return Api
     */
    public function assists()
    {
        return $this->api->setResource('assists');
    }

    /**
     * @return Api
     */
    public function offence()
    {
        return $this->api->setResource('offence');
    }

    /**
     * @return Api
     */
    public function topscorer()
    {
        return $this->api->setResource('topscorer');
    }

    /**
     * @return Api
     */
    public function teams()
    {
        return $this->api->setResource('teams');
    }

    /**
     * @return Api
     */
    public function fixtures()
    {
        return $this->api->setResource('fixtures');
    }

    /**
     * @return Api
     */
    public function standings()
    {
        return $this->api->setResource('standings');
    }

    /**
     * @return Api
     */
    public function news()
    {
        return $this->api->setResource('news');
    }
}
