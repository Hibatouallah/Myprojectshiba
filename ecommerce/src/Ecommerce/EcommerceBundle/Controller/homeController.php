<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class homeController extends Controller
{
    public function homeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $findproduit = $em->getRepository('EcommerceBundle:produits')->findAll();

        $result = $this->get('knp_paginator');
        $produits=$result->paginate(
                $findproduit,
                $request->query->getInt('page',1),
                $request->query->getInt('limit',6)
            );
     

        //->paginate($findproduit,$this->get('request')->query->get('page', 1),3);
        
        return $this->render('EcommerceBundle:Default:home.html.twig', array(
            'produits' => $produits,
        ));
       
    }
    public function productdetailsAction()
    {
        return $this->render('EcommerceBundle:Default:productdetails.html.twig');
    }
    public function checkoutAction()
    {
        return $this->render('EcommerceBundle:Default:checkout.html.twig');
    }
    public function cartAction()
    {
        return $this->render('EcommerceBundle:Default:cart.html.twig');
    }
     public function loginAction()
    {
        return $this->render('EcommerceBundle:Default:login.html.twig');
    }
     public function contactAction()
    {
        return $this->render('EcommerceBundle:Default:contact.html.twig');
    }
     public function ProfileAction()
    {
        return $this->render('EcommerceBundle:Default:profile.html.twig');
    }
     public function EnvoyerAction()
    {
        $Request=$this->getRequest();
        if($Request->getMethod()=="POST")
        {
            $Subject=$Request->get('Subject');
            $email=$Request->get('email');
            $message=$Request->get('message');

            $envoier = \Swift_Message::newInstance()
                ->setSubject($Subject)
                ->setFrom(array("electrohl.shop@gmail.com"=> "client"))
                ->setTo("electrohl.shop@gmail.com")
                ->setCharset('utf-8')
                ->setContentType('text/html')
                ->setBody($this->renderView('EcommerceBundle:swiftmailer:message.html.twig',array('email' => $email,
                                                                                                  'message'=> $message 
                                                                                                  )));
                $this->get('mailer')->send($envoier);
        }
         
        return $this->render('EcommerceBundle:swiftmailer:demandeenvoyer.html.twig');
    }
}
