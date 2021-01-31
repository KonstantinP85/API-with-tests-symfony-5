<?php


namespace App\Tests\Controller;

use App\DataFixtures\CategoryFixtures;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class CategoryControllerTest extends WebTestCase
{
    public function testShowCategories()
    {
        $client=static::createClient();
        $client ->request('GET', '/v3.0/category/');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }

}

