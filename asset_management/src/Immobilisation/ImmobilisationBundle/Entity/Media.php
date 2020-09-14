<?php

namespace Immobilisation\ImmobilisationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Media
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Immobilisation\ImmobilisationBundle\Repository\MediaRepository")
 */
class Media
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
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\ManyToOne(targetEntity="Immobilisation\ImmobilisationBundle\Entity\Immobilisation")
     * @ORM\JoinColumn(nullable=true)
     */
    private $immobilisation;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;


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
     * Set libelle
     *
     * @param string $libelle
     * @return Media
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Media
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set immobilisation
     *
     * @param \Immobilisation\ImmobilisationBundle\Entity\Immobilisation $immobilisation
     *
     * @return Media
     */
    public function setImmobilisation(\Immobilisation\ImmobilisationBundle\Entity\Immobilisation $immobilisation = null)
    {
        $this->immobilisation = $immobilisation;

        return $this;
    }

    /**
     * Get immobilisation
     *
     * @return \Immobilisation\ImmobilisationBundle\Entity\Immobilisation
     */
    public function getImmobilisation()
    {
        return $this->immobilisation;
    }

    
}
