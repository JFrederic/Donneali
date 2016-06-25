<?php

namespace Users\UsersBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ShowDonationControllerTest extends WebTestCase
{
    public function testShowdonation()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/show/donation');
    }

}
