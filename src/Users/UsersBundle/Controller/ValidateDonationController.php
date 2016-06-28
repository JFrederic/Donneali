<?php

namespace Users\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ValidateDonationController extends Controller {

    public function ValidateDonationAction($donId, $assosId) {

        if ($donId > 0) {
            $user = $this->get('security.token_storage')->getToken()->getUser();

            $em = $this->getDoctrine()->getManager();

            $don = $em->getRepository('DonationsDonationsBundle:Donations')
                    ->find($donId);

            if (($user->getId() == $don->getUser()->getId()) && $don->getAvailable()) {
                $em2 = $this->getDoctrine()->getManager();
                $assos = $em2->getRepository('UsersUsersBundle:Users')
                        ->find($assosId);
                foreach ($don->getAssociationsask() as $associationAsk) {
                    if ($associationAsk->getId() == $assos->getId()) {
                        $don->setAvailable(0);
                        $don->setAssociation($assos);
                        $assos->addDonationgetted($don);
                        $em->persist($don);
                        $em2->persist($assos);
                        $em->flush();
                        $em2->flush();
                        /*
                          $message = \Swift_Message::newInstance()
                          ->setSubject('Don reçu')
                          ->setFrom('$user->getEmail')
                          ->setTo('$assos->getEmail')
                          ->setBody(
                          $this->renderView(
                          // app/Resources/views/Emails/registration.html.twig
                          'Emails/registration.html.twig', array('name' => $name)
                          ), 'text/html'
                          )
                          ;
                          $this->get('mailer')->send($message);
                         */
                        return $this->render('UsersUsersBundle:ValidateDonation:validate_donation.html.twig', array(
                                    'success' => true
                        ));
                    }
                }
            }
        }

        return $this->render('UsersUsersBundle:ValidateDonation:validate_donation.html.twig', array(
                    'success' => false
        ));
    }

}
