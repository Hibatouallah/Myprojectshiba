<?php

namespace Ecommerce\EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * produits
 *
 * @ORM\Table("produits")
 * @ORM\Entity(repositoryClass="Ecommerce\EcommerceBundle\Repository\produitsRepository")
 */
class produits
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="Ecommerce\EcommerceBundle\Entity\media", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    
    private $media;

    /**
     * @ORM\ManyToOne(targetEntity="Ecommerce\EcommerceBundle\Entity\sub_categorie")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sub_categorie;
    
    /**
     * @ORM\ManyToOne(targetEntity="Ecommerce\EcommerceBundle\Entity\marque")
     * @ORM\JoinColumn(nullable=false)
     */
    private $marque;
    /**
     * @ORM\ManyToOne(targetEntity="Ecommerce\EcommerceBundle\Entity\Tva")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tva;
    /**
     * @var string
     *
     * @ORM\Column(name="prix_ht", type="decimal")
     */
    private $prixHt;

     /**
     * @var string
     *
     * @ORM\Column(name="description", type="string")
     */
    private $description;

      /**
     * @var string
     *
     * @ORM\Column(name="prixpromotion", type="decimal")
     */
    private $prixpromotion;
     /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string")
     */
    private $nom;
    /**
     * @var string
     *
     * @ORM\Column(name="prix_ttc", type="decimal")
     */
    private $prixTtc;

    /**
     * @var string
     *
     * @ORM\Column(name="stock", type="decimal")
     */
   
    private $stock;

  


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
     * Set prixHt
     *
     * @param string $prixHt
     * @return produits
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
     * Set prixpromotion
     *
     * @param string $prixpromotion
     * @return produits
     */
    public function setPrixpromotion($prixpromotion)
    {
        $this->prixpromotion = $prixpromotion;

        return $this;
    }

    /**
     * Get prixpromotion
     *
     * @return string 
     */
    public function getPrixpromotion()
    {
        return $this->prixpromotion;
    }


     /**
     * Set description
     *
     * @param string $description
     * @return produits
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

     /**
     * Set nom
     *
     * @param string $nom
     * @return produits
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }
    /**
     * Set prixTtc
     *
     * @param string $prixTtc
     * @return produits
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
     * Set stock
     *
     * @param integer $stock
     * @return produits
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return integer 
     */
    public function getStock()
    {
        return $this->stock;
    }

    

    

    /**
     * Set media
     *
     * @param \Ecommerce\EcommerceBundle\Entity\media $media
     *
     * @return produits
     */
    public function setMedia(\Ecommerce\EcommerceBundle\Entity\media $media)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media
     *
     * @return \Ecommerce\EcommerceBundle\Entity\media
     */
    public function getMedia()
    {
        return $this->media;
    }

   
    /**
     * Set subCategorie
     *
     * @param \Ecommerce\EcommerceBundle\Entity\sub_categorie $subCategorie
     *
     * @return produits
     */
    public function setSubCategorie(\Ecommerce\EcommerceBundle\Entity\sub_categorie $subCategorie)
    {
        $this->sub_categorie = $subCategorie;

        return $this;
    }

    /**
     * Get subCategorie
     *
     * @return \Ecommerce\EcommerceBundle\Entity\sub_categorie
     */
    public function getSubCategorie()
    {
        return $this->sub_categorie;
    }

   

    /**
     * Set marque
     *
     * @param \Ecommerce\EcommerceBundle\Entity\marque $marque
     *
     * @return produits
     */
    public function setMarque(\Ecommerce\EcommerceBundle\Entity\marque $marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return \Ecommerce\EcommerceBundle\Entity\marque
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set tva
     *
     * @param \Ecommerce\EcommerceBundle\Entity\Tva $tva
     *
     * @return produits
     */
    public function setTva(\Ecommerce\EcommerceBundle\Entity\Tva $tva)
    {
        $this->tva = $tva;

        return $this;
    }

    /**
     * Get tva
     *
     * @return \Ecommerce\EcommerceBundle\Entity\Tva
     */
    public function getTva()
    {
        return $this->tva;
    }
  
    public function __toString(){
        return $this->nom;
    }
    
    
}
