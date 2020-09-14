<?php

namespace Ecommerce\EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * prd_categorie
 *
 * @ORM\Table("sub_categorie")
 * @ORM\Entity(repositoryClass="Ecommerce\EcommerceBundle\Repository\sub_categorieRepository")
 */
class sub_categorie
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
     * @ORM\ManyToOne(targetEntity="Ecommerce\EcommerceBundle\Entity\categorie")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idcategorie;
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="text")
     */
    private $nom;
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
     * Set nom
     *
     * @param string $nom
     * @return sub_categorie
     */
    public function setPrixHt($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getnom()
    {
        return $this->nom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return sub_categorie
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Set idcategorie
     *
     * @param \Ecommerce\EcommerceBundle\Entity\categorie $idcategorie
     *
     * @return sub_categorie
     */
    public function setIdcategorie(\Ecommerce\EcommerceBundle\Entity\categorie $idcategorie)
    {
        $this->idcategorie = $idcategorie;

        return $this;
    }

    /**
     * Get idcategorie
     *
     * @return \Ecommerce\EcommerceBundle\Entity\categorie
     */
    public function getIdcategorie()
    {
        return $this->idcategorie;
    }
      
    public function __toString(){
        return $this->nom;
    }
}
