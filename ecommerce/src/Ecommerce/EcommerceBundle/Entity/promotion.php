<?php

namespace Ecommerce\EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * promotion
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Ecommerce\EcommerceBundle\Entity\promotionRepository")
 */
class promotion
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
     * @ORM\ManyToOne(targetEntity="Ecommerce\EcommerceBundle\Entity\produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $produits;
    /**
     * @var string
     *
     * @ORM\Column(name="prix", type="decimal")
     */
    private $prix;


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
     * Set prix
     *
     * @param string $prix
     *
     * @return promotion
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return string
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set produits
     *
     * @param \Ecommerce\EcommerceBundle\Entity\produits $produits
     *
     * @return promotion
     */
    public function setProduits(\Ecommerce\EcommerceBundle\Entity\produits $produits)
    {
        $this->produits = $produits;

        return $this;
    }

    /**
     * Get produits
     *
     * @return \Ecommerce\EcommerceBundle\Entity\produits
     */
    public function getProduits()
    {
        return $this->produits;
    }
}
