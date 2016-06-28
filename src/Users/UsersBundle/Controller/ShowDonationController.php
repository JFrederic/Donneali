<?php

namespace Users\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShowDonationController extends Controller {

    public function ShowDonationAction() {
        $user = $this->get('security.token_storage')->getToken()->getUser();

        $em = $this->getDoctrine()->getManager();
        $ListeDonationUser = $em->getRepository('DonationsDonationsBundle:Donations')
                ->findByUser($user->getId());

        return $this->render('UsersUsersBundle:ShowDonation:show_donation.html.twig', array(
                    'ListeDonationUser' => $ListeDonationUser
        ));
    }

}
