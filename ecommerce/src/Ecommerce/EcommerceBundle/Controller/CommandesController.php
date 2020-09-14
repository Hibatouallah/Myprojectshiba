<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Ecommerce\EcommerceBundle\Entity\UtilisateursAdresses;
use Ecommerce\EcommerceBundle\Entity\Commandes;
use Ecommerce\EcommerceBundle\Entity\Produits;

class CommandesController extends Controller
{
    public function facture()
    {
        $em = $this->getDoctrine()->getManager();
        $generator = $this->container->get('security.secure_random');
        $session = $this->getRequest()->getSession();
        $adresse = $session->get('adresse');
        $panier = $session->get('panier');
        $commande = array();
        $totalHT = 0;
        $totalTTC = 0;
        $user=$this->container->get('security.context')->getToken()->getUser();
        
        $livraison = $em->getRepository('EcommerceBundle:UtilisateursAdresses')->find($adresse['livraison']);

        $produits = $em->getRepository('EcommerceBundle:produits')->findArray(array_keys($session->get('panier')));
        foreach($produits as $produit)
        {
            $prixHt = ($produit->getPrixHt() * $panier[$produit->getId()]);
            $prixTtc = ($produit->getPrixHt() * $panier[$produit->getId()] / $produit->getTva()->getMultiplicate());
            $totalHT += $prixHt;
            $totalTTC += $prixTtc;
            
            if (!isset($commande['tva']['%'.$produit->getTva()->getValeur()]))
                $commande['tva']['%'.$produit->getTva()->getValeur()] = round($prixTtc - $prixHt,2);
            else
                $commande['tva']['%'.$produit->getTva()->getValeur()] += round($prixTtc - $prixHt,2);
            
            $commande['produit'][$produit->getId()] = array('reference' => $produit->getNom(),
                                                            'quantite' => $panier[$produit->getId()],
                                                            'prixHt' => round($produit->getPrixHt(),2),
                                                            'prixTtc' => round($produit->getPrixHt() / $produit->getTva()->getMultiplicate(),2));
            

        }  
        
        $commande['adresse'] = array('prenom' => $livraison->getPrenom(),
                                    'nom' => $livraison->getNom(),
                                    'telephone' => $livraison->getTelephone(),
                                    'adresse' => $livraison->getAdresse(),
                                    'codepostal' => $livraison->getCodepostal(),
                                    'ville' => $livraison->getVille(),
                                    'pays' => $livraison->getPays()
                                      );

      

        $commande['prixHt'] = round($totalHT,2);
        $commande['prixTtc'] = round($totalTTC,2);
        $commande['token'] = bin2hex($generator->nextBytes(20));
        
        return $commande;

    }
    
    public function prepareCommandeAction()
    {
        $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();
        
        if (!$session->has('commande'))
            $commande = new Commandes();
        else
            $commande = $em->getRepository('EcommerceBundle:Commandes')->find($session->get('commande'));
        
        $commande->setDate(new \DateTime());
        $commande->setUtilisateur($this->container->get('security.context')->getToken()->getUser());
        $commande->setValider(0);
        $commande->setReference(0);
        $commande->setCommande($this->facture());
        
        if (!$session->has('commande')) {
            $em->persist($commande);
            $session->set('commande',$commande);
        }
        
        $em->flush();
        
        return new Response($commande->getId());
    }
    
    /*
     * Cette methode remplace l'api banque.
     */
    public function validationCommandeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $commande = $em->getRepository('EcommerceBundle:Commandes')->find($id);
        
        if (!$commande || $commande->getValider() == 1)
            throw $this->createNotFoundException('La commande n\'existe pas');
        
        $commande->setValider(1);
        $commande->setReference($this->container->get('setNewReference')->reference()); //Service
        $em->flush();    
        
        $session = $this->getRequest()->getSession();
        $session->remove('adresse');
        $session->remove('panier');
        $session->remove('commande');
        //Ici le mail de validation
        $message = \Swift_Message::newInstance()
                ->setSubject('Validation de votre commande')
                ->setFrom(array('electrohl.shop@gmail.com' => "electrohl"))
                ->setTo($commande->getUtilisateur()->getEmailCanonical())// adresse email canolical sans majiscule
                ->setCharset('utf-8')
                ->setContentType('text/html')
                ->setBody($this->renderView('EcommerceBundle:swiftmailer:validationCommande.html.twig',array('utilisateur' => $commande->getUtilisateur())));

        $this->get('mailer')->send($message);
       
        $this->get('session')->getFlashBag()->add('success','Votre commande est validé avec succès');
        return $this->redirect($this->generateUrl('afficherfacture'));
    }

      public function AfficherCommandeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user=$utilisateur=$this->container->get('security.context')->getToken()->getUser();
        $entities = $em->getRepository('EcommerceBundle:Commandes')->findArray($user);
        /*var_dump($entities);
        die();*/
        return $this->render('EcommerceBundle:Default:affichercommandes.html.twig', array(
            'entities' => $entities,
        ));
    }
}
