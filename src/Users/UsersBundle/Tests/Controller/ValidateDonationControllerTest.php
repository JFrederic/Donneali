<?php

namespace Users\UsersBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ValidateDonationControllerTest extends WebTestCase
{
    public function testValidatedonation()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/validate/donation');
    }

}
