<?php

namespace Donations\DonationsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em3 = $this->getDoctrine()->getManager(); 
        $listedonations = $em3->getRepository('DonationsDonationsBundle:Donations')
                ->findAll();
        
        return $this->render('DonationsDonationsBundle:Default:index.html.twig', 
                array('listedonations' => $listedonations
        ));
    }
}
