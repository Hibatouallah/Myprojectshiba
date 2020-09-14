<?php

namespace Immobilisation\ImmobilisationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sousfamille
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Immobilisation\ImmobilisationBundle\Repository\SousfamilleRepository")
 */
class Sousfamille
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
     * @ORM\ManyToOne(targetEntity="Immobilisation\ImmobilisationBundle\Entity\Famille")
     * @ORM\JoinColumn(nullable=true)
     */
    private $famille;

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
     * @return Sousfamille
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
     * Set famille
     *
     * @param \Immobilisation\ImmobilisationBundle\Entity\Famille $famille
     *
     * @return Sousfamille
     */
    public function setFamille(\Immobilisation\ImmobilisationBundle\Entity\Famille $famille = null)
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * Get famille
     *
     * @return \Immobilisation\ImmobilisationBundle\Entity\Famille
     */
    public function getFamille()
    {
        return $this->famille;
    }

    public function __toString()
    {
        return ($this->getLibelle()) ? : '';
    }
    
}
