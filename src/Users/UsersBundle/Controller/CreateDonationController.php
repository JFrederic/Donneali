<?php

namespace Users\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Donations\DonationsBundle\Entity\Donations;

class CreateDonationController extends Controller
{
    public function CreateDonationAction()
    {      
        $em1 = $this->getDoctrine()->getManager(); 
        $user = $em1->getRepository('UsersUsersBundle:Users')->find(1);
        
        $donation = new Donations();
        $donation->setAvailable(true);
        $donation->setCategory('Divers');
        $donation->setCity('St-André');
        $donation->setDate(new \DateTime('now'));
        $donation->setDescription('Chaussettes usagées');
        $donation->setTitle('Chaussettes de Dimitri Payet');
        $donation->setUser($user);
        
        $user->addDonation($donation);
        
        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($user);
        $em->persist($donation);
        $em->flush();
        
        $em3 = $this->getDoctrine()->getManager(); 
        $listedonations = $em3->getRepository('DonationsDonationsBundle:Donations')
                ->findBy(array('user' => $user->getId()));
        
        return $this->render('UsersUsersBundle:CreateDonation:create_donation.html.twig', 
                array('listedonations' => $listedonations
        ));
    }

}
