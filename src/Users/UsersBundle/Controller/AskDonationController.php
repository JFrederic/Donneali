<?php

namespace Users\UsersBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Donations\DonationsBundle\Entity\Donations;


class AskDonationController extends Controller
{
    public function AskDonationAction($donId)
    {


      $user = $this->get('security.token_storage')->getToken()->getUser();

      if($donId){


      $don = new Donations();
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

      $Liste = $this->getDoctrine()
      ->getRepository('DonationsDonationsBundle:Donations')
      ->getAvailableDon();

      $donation = new Donations();
      $ListeDonation = [];
      
      foreach($Liste as $key => $donnation)
      {
        foreach ($donnation->getAssociationsask() as $key => $associationAsk) {
          if($associationAsk->getId() == $user->getId()){
            unset($Liste[$key]);
            break;
          }
        }
          //$ListeDonation = $donation;

      }


        return $this->render('UsersUsersBundle:AskDonation:ask_donation.html.twig', array(
          'ListeDonation' => $Liste,
        ));
    }

}
