<?php

namespace Users\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Donations\DonationsBundle\Entity\Donations;
use Users\UsersBundle\Entity\Users;

class ValidateDonationController extends Controller {

    /**
     * @ParamConverter("don",   options={"mapping": {"donId": "id"}})
     * @ParamConverter("assos", options={"mapping": {"assosId": "id"}})
     */
    public function ValidateDonationAction(Donations $don, Users $assos) {

        $success = false;
        $user = $this->get('security.token_storage')->getToken()->getUser();

        if (($user->getId() == $don->getUser()->getId()) && $don->getAvailable()) {

            $em = $this->getDoctrine()->getManager();

            foreach ($don->getAssociationsask() as $associationAsk) {
                if ($associationAsk->getId() == $assos->getId()) {
                    $success = true;
                    $don->setAvailable(0);
                    $don->setAssociation($assos);
                    $assos->addDonationgetted($don);
                    $em->persist($don);
                    $em->persist($assos);
                    $em->flush();
                    /*
                     *******TODO: CREATE A SERVICE SENDEMAIL*******
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
                    break;
                }
            }
        }

        return $this->render('UsersUsersBundle:ValidateDonation:validate_donation.html.twig', array(
                    'success' => $success
        ));
    }

}
