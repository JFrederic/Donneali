<?php

namespace Users\UsersBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AskDonationControllerTest extends WebTestCase
{
    public function testAskdonation()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ask/donation');
    }

}
