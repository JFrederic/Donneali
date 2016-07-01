<?php

namespace Users\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AskDonationController extends Controller {

    public function AskDonationAction($donId) {
        $user = $this->get('security.token_storage')->getToken()->getUser();

        if ($donId) {

            $em = $this->getDoctrine()->getManager();
            $don = $em->getRepository('DonationsDonationsBundle:Donations')
                    ->find($donId);

            $user->addDonationAsked($don);
            $don->addAssociationsask($user);

            $em2 = $this->getDoctrine()->getEntityManager();
            $em2->persist($user);
            $em2->persist($don);
            $em2->flush();
        }

        $ListeDonation = $this->getDoctrine()
                ->getRepository('DonationsDonationsBundle:Donations')
                ->findByAvailable(1);

        foreach ($ListeDonation as $key => $donnation) {
            foreach ($donnation->getAssociationsask() as $associationAsk) {
                if ($associationAsk->getId() == $user->getId()) {
                    unset($ListeDonation[$key]);
                }
            }
        }

        return $this->render('UsersUsersBundle:AskDonation:ask_donation.html.twig', array(
                    'ListeDonation' => $ListeDonation,
        ));
    }

}
