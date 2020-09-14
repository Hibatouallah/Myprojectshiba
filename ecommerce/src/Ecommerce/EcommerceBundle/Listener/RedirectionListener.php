<?php
namespace Ecommerce\EcommerceBundle\Listener;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class RedirectionListener 
{
    public function __construct(ContainerInterface $container, Session $session)
    {
        $this->session = $session;
        $this->router = $container->get('router');//pour chercher la route en question
        $this->securityContext = $container->get('security.context');
    }
    
    public function onKernelRequest(GetResponseEvent $event)
    {
        $route = $event->getRequest()->attributes->get('_route');
        
        if ($route == 'livraison' || $route == 'validation') {// on vérifie que la route égale à la route de livraison
            if ($this->session->has('panier')) {
                if (count($this->session->get('panier')) == 0)// on compte le nonmbre des éléments du panier
                    $event->setResponse(new RedirectResponse($this->router->generate('panier')));
            }
        
            if (!is_object($this->securityContext->getToken()->getUser())) {// on recupere notre utilisateur et on le mettre dans un objet
                $this->session->getFlashBag()->add('notification','Vous devez vous identifier');
                $event->setResponse(new RedirectResponse($this->router->generate('fos_user_security_login')));
            }
        }
    }
}