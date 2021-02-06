<?php


namespace App\Tests\Controller;



use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class CategoryControllerTest extends TestController
{

    public function exampleCategory()
    {
        return '{"name": "new_category'.rand(1, 10).'", "description": "category_description'.rand(1, 10).'"}';
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
        $response = $this->getResponseFromRequest(Request::METHOD_POST, '/v3.0/category/create', $this->exampleCategory());

        $responseContent = $response->getContent();
        $responseDecode = json_decode($responseContent);

        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
        $this->assertNotEmpty($responseDecode);
        $this->assertJson($responseContent);
    }

    public function testUpdateCategory()
    {
        $response = $this->getResponseFromRequest(Request::METHOD_PATCH, '/v3.0/category/'.rand(28,30).'/update', $this->exampleCategory());

        $responseContent = $response->getContent();
        $responseDecode = json_decode($responseContent);

        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
        $this->assertNotEmpty($responseDecode);
        $this->assertJson($responseContent);
    }

    public function testDeleteCategory()
    {
        $response = $this->getResponseFromRequest(Request::METHOD_DELETE, '/v3.0/category/'.rand(28,30).'/delete');

        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
    }

}

