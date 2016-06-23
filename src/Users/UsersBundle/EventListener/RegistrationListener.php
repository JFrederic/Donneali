<?php
namespace Users\UsersBundle\EventListener;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Listener responsible to change the redirection at the end of the password resetting
 */
class RegistrationListener implements EventSubscriberInterface
{


    /**
     * {@inheritDoc}
     */


    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationSuccess',
        );
    }

    public function onRegistrationSuccess(FormEvent $event)
    {


        //
        // $event->setResponse(new RedirectResponse($url));

        $rolesParticulier = 'ROLE_PARTICULIER';
        $rolesAssos = 'ROLE_ASSOS';

       /** @var $user \FOS\UserBundle\Model\UserInterface */
       $user = $event->getForm()->getData();

       if($user->getType() == 1)
       {
         $user->addRole($rolesAssos);
       }
       else {
         $user->addRole($rolesParticulier);
       }
    }

}
