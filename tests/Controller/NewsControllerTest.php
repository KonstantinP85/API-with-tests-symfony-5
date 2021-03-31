<?php


namespace App\Tests\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class NewsControllerTest extends TestController
{

    public function exampleNews()
    {
        return '{"title": "new_n'.rand(1, 10).'", "content": "news_d'.rand(1, 10).'", "category": '.rand(1, 5).'}';
    }

    public function testShowNews()
    {
        $response = $this->getResponseFromRequest(Request::METHOD_GET, '/v3.0/news');
        $responseContent = $response->getContent();
        $responseDecode = json_decode($responseContent);
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
        $this->assertNotEmpty($responseDecode);
        $this->assertJson($responseContent);
    }

    public function testCreateNews()
    {
        $response = $this->getResponseFromRequest(Request::METHOD_POST, '/v3.0/news/create', $this->exampleNews());

        $responseContent = $response->getContent();
        $responseDecode = json_decode($responseContent);

        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
        $this->assertNotEmpty($responseDecode);
        $this->assertJson($responseContent);
    }

    public function testUpdateNews()
    {
        $response = $this->getResponseFromRequest(Request::METHOD_PATCH, '/v3.0/news/'.rand(18,19).'/update', $this->exampleNews());

        $responseContent = $response->getContent();
        $responseDecode = json_decode($responseContent);

        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
        $this->assertNotEmpty($responseDecode);
        $this->assertJson($responseContent);
    }

    public function testDeleteNews()
    {
        $response = $this->getResponseFromRequest(Request::METHOD_DELETE, '/v3.0/news/'.rand(18,20).'/delete');

        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
    }
}