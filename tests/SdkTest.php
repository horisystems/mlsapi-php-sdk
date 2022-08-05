<?php

use PHPUnit\Framework\TestCase;
use Mslapi\Mslapi\Client;

class SdkTest extends TestCase
{
    public function testInit()
    {
        $this->assertInstanceOf(Client::class, Client::init());
    }

    public function testInitWithToken()
    {
        $this->assertInstanceOf(Client::class, Client::initWithToken('dasfgagh'));
    }

    public function testLogin()
    {
        $client = Client::init();
        $res = $client->authentication(getenv('username'), getenv('password'));
        $this->assertArrayHasKey('Document', $res);
        return $client;
    }

    /**
     *  @depends testLogin
     */
    public function testApi(Client $client)
    {
        $resources = [
            'teams',  'players', 'rtd', 'assists', 'offence', 'topscorer', 'fixtures', 'standings', 'news', 'hist',
        ];

        foreach ($resources as $resource) {
            $all = $client->$resource()->getAll();

            $this->assertArrayHasKey('Code', $all);
            $this->assertArrayHasKey('Document', $all);
            $this->assertEquals($all['Code'], 1);
            $this->assertIsArray($all['Document']);

            if (count($all['Document']) > 0) {
                print_r($all['Document'][0]);
                $one = $client->$resource()->getById($all['Document'][0]['id']);
                $this->assertArrayHasKey('Code', $one);
                $this->assertArrayHasKey('Document', $one);
            }
            usleep(1500);
        }
    }
}
