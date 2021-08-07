<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class TestController extends WebTestCase
{
    public array $serverInformation= ['ACCEPT'=>'application/json', 'CONTENT_TYPE'=>'application/json'];

    /**
     * @param string $method
     * @param string $uri
     * @param string $testData
     * @return Response
     */
    public function getResponseFromRequest(string $method, string $uri, string $testData=''): Response
    {
        $client = static::createClient();
        $client->request($method, $uri, [], [], $this->serverInformation, $testData);
        return $client->getResponse();
    }
}