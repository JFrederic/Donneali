<?php

namespace Users\UsersBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CreateDonationControllerTest extends WebTestCase
{
    public function testCreatedonation()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/create/donation');
    }

}
