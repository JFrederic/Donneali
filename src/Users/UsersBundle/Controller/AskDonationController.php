<?php

namespace Users\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AskDonationController extends Controller
{
    public function AskDonationAction()
    {
        return $this->render('UsersUsersBundle:AskDonation:ask_donation.html.twig', array(
            // ...
        ));
    }

}
