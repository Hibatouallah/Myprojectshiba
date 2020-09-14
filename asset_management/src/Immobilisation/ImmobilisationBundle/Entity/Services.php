<?php

namespace Immobilisation\ImmobilisationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Services
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Immobilisation\ImmobilisationBundle\Repository\ServicesRepository")
 */
class Services
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
     * @ORM\ManyToOne(targetEntity="Immobilisation\ImmobilisationBundle\Entity\devision")
     * @ORM\JoinColumn(nullable=true)
     */
    private $devision;


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
     * @return Services
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
     * Set devision
     *
     * @param \Immobilisation\ImmobilisationBundle\Entity\devision $devision
     *
     * @return Services
     */
    public function setDevision(\Immobilisation\ImmobilisationBundle\Entity\devision $devision = null)
    {
        $this->devision = $devision;

        return $this;
    }

    /**
     * Get devision
     *
     * @return \Immobilisation\ImmobilisationBundle\Entity\devision
     */
    public function getDevision()
    {
        return $this->devision;
    }

    public function __toString()
    {
        return ($this->getLibelle()) ? : '';
    }
}
