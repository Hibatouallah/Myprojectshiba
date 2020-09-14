<?php

namespace Immobilisation\ImmobilisationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GestionImmoController extends Controller
{
    public function homeAction()
    {
        return $this->render('ImmobilisationBundle:Default:home.html.twig');
    }


    public function UtilisateurPageAction()
    {
        return $this->render('ImmobilisationBundle:Default:acceuilUser.html.twig');
    }
}
