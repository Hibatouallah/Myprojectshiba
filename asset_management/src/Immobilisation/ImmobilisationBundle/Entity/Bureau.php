<?php

namespace Immobilisation\ImmobilisationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bureau
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Immobilisation\ImmobilisationBundle\Repository\BureauRepository")
 */
class Bureau
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
     * @ORM\ManyToOne(targetEntity="Immobilisation\ImmobilisationBundle\Entity\Services")
     * @ORM\JoinColumn(nullable=true)
     */
    private $services;


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
     * @return Bureau
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
     * Set services
     *
     * @param \Immobilisation\ImmobilisationBundle\Entity\Services $services
     *
     * @return Bureau
     */
    public function setServices(\Immobilisation\ImmobilisationBundle\Entity\Services $services = null)
    {
        $this->services = $services;

        return $this;
    }

    /**
     * Get services
     *
     * @return \Immobilisation\ImmobilisationBundle\Entity\Services
     */
    public function getServices()
    {
        return $this->services;
    }
    
    public function __toString()
    {
        return ($this->getLibelle()) ? : '';
    }
}
