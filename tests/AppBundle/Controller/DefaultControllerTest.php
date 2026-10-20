<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('text/html', $client->getResponse()->headers->get('Content-Type'));
        $this->assertEquals('Bar', trim($crawler->filter('title')->text()));
    }

    public function testUnknownRouteReturns404()
    {
        $client = static::createClient();
        $client->request('GET', '/this-route-does-not-exist');

        $this->assertEquals(404, $client->getResponse()->getStatusCode());
    }
}
