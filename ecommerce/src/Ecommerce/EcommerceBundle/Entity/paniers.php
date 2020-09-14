<?php

namespace Ecommerce\EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * paniers
 *
 * @ORM\Table("paniers")
 * @ORM\Entity(repositoryClass="Ecommerce\EcommerceBundle\Repository\paniersRepository")
 */
class paniers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idpaniers", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idpaniers;

    /**
     * @ORM\ManyToOne(targetEntity="Utilisateurs\UtilisateursBundle\Entity\Utilisateurs", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateur;

     /**
     * @ORM\ManyToOne(targetEntity="Ecommerce\EcommerceBundle\Entity\produits", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $produit;
    

    /**
     * @var string
     *
     * @ORM\Column(name="libel", type="string", length=250)
     */
    private $libel;

    /**
     * @var string
     *
     * @ORM\Column(name="prix_ht", type="decimal")
     */
    private $prixHt;

    /**
     * @var string
     *
     * @ORM\Column(name="prix_ttc", type="decimal")
     */
    private $prixTtc;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="bigint")
     */
    private $quantite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

   

    /**
     * Set libel
     *
     * @param string $libel
     * @return paniers
     */
    public function setLibel($libel)
    {
        $this->libel = $libel;

        return $this;
    }

    /**
     * Get libel
     *
     * @return string 
     */
    public function getLibel()
    {
        return $this->libel;
    }

    /**
     * Set prixHt
     *
     * @param string $prixHt
     * @return paniers
     */
    public function setPrixHt($prixHt)
    {
        $this->prixHt = $prixHt;

        return $this;
    }

    /**
     * Get prixHt
     *
     * @return string 
     */
    public function getPrixHt()
    {
        return $this->prixHt;
    }

    /**
     * Set prixTtc
     *
     * @param string $prixTtc
     * @return paniers
     */
    public function setPrixTtc($prixTtc)
    {
        $this->prixTtc = $prixTtc;

        return $this;
    }

    /**
     * Get prixTtc
     *
     * @return string 
     */
    public function getPrixTtc()
    {
        return $this->prixTtc;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     * @return paniers
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer 
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return paniers
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Get idpaniers
     *
     * @return integer
     */
    public function getIdpaniers()
    {
        return $this->idpaniers;
    }

    /**
     * Set utilisateur
     *
     * @param \Utilisateurs\UtilisateursBundle\Entity\Utilisateurs $utilisateur
     *
     * @return paniers
     */
    public function setUtilisateur(\Utilisateurs\UtilisateursBundle\Entity\Utilisateurs $utilisateur)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \Utilisateurs\UtilisateursBundle\Entity\Utilisateurs
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set produit
     *
     * @param \Ecommerce\EcommerceBundle\Entity\produits $produit
     *
     * @return paniers
     */
    public function setProduit(\Ecommerce\EcommerceBundle\Entity\produits $produit)
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit
     *
     * @return \Ecommerce\EcommerceBundle\Entity\produits
     */
    public function getProduit()
    {
        return $this->produit;
    }
}
