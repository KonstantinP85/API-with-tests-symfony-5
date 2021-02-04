<?php


namespace App\Tests\Controller;



use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class CategoryControllerTest extends WebTestCase
{
    public $serverInformation= ['ACCEPT'=>'application/json', 'CONTENT_TYPE'=>'application/json'];
    public $testCategory = '{"name": "new_category", "description": "category_description"}';

    public function getResponseFromRequest(string $method, string $uri, string $testCategory='')
    {
        $client = static::createClient();
        $client->request($method, $uri, [], [], $this->serverInformation, $testCategory);
        return $client->getResponse();
    }

    public function testShowCategory()
    {
        $response = $this->getResponseFromRequest(Request::METHOD_GET, '/v3.0/category');
        $responseContent = $response->getContent();
        $responseDecode = json_decode($responseContent);
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
        $this->assertNotEmpty($responseDecode);
        $this->assertJson($responseContent);
    }

    public function testCreateCategory()
    {
        $response = $this->getResponseFromRequest(Request::METHOD_POST, '/v3.0/category/create', $this->testCategory);

        $responseContent = $response->getContent();
        $responseDecode = json_decode($responseContent);

        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
        $this->assertNotEmpty($responseDecode);
        $this->assertJson($responseContent);
    }

}

