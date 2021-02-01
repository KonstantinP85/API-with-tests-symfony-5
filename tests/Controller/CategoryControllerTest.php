<?php


namespace App\Tests\Controller;



use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class CategoryControllerTest extends WebTestCase
{

    public function testCreateCategory()
    {
        $client = static::createClient();
        $client->request('GET', '/v3.0/category/create');
        $client->submitForm('Submit', [
            'category_form[name]' => 'Name1',
            'comment_form[description]' => 'Description1',
            ]);
        $this->assertResponseRedirects();
        $client->followRedirect();              //принудительно вызываем перенаправление
        $this->assertSelectorExists('("")');
    }

    public function testShowCategories()
    {
        $client = static::createClient();
        $client->request('GET', '/v3.0/category');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

}

