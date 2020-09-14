<?php

namespace Immobilisation\ImmobilisationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ammortissements
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Immobilisation\ImmobilisationBundle\Repository\AmmortissementsRepository")
 */
class Ammortissements
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
     * @ORM\ManyToOne(targetEntity="Immobilisation\ImmobilisationBundle\Entity\Immobilisation")
     * @ORM\JoinColumn(nullable=true)
     */
    private $immobilisation;

    /**
     * @var string
     *
     * @ORM\Column(name="cumulammortn", type="decimal",nullable=true)
     */
    private $cumulammortn;

    /**
     * @var string
     *
     * @ORM\Column(name="dotation_ANT", type="decimal",nullable=true)
     */
    private $dotation_ANT;

    /**
     * @var string
     *
     * @ORM\Column(name="dotation", type="decimal",nullable=true)
     */
    private $dotation;

    /**
     * @var string
     *
     * @ORM\Column(name="annee", type="string")
     */
    private $annee;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string")
     */
    private $libelle;

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
     * @return Ammortissements
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
     * Set libelle
     *
     * @param string $dotation_ANT
     * @return Ammortissements
     */
    public function setDotationANT($dotation_ANT)
    {
        $this->dotation_ANT = $dotation_ANT;

        return $this;
    }

    /**
     * Get dotation_ANT
     *
     * @return string 
     */
    public function getDotationANT()
    {
        return $this->dotation_ANT;
    }
    

    /**
     * Set cumulammortn
     *
     * @param string $cumulammortn
     * @return Ammortissements
     */
    public function setCumulammortn($cumulammortn)
    {
        $this->cumulammortn = $cumulammortn;

        return $this;
    }

    /**
     * Get cumulammortn
     *
     * @return string 
     */
    public function getCumulammortn()
    {
        return $this->cumulammortn;
    }

    /**
     * Set baseammort
     *
     * @param string $baseammort
     * @return Ammortissements
     */
    public function setBaseammort($baseammort)
    {
        $this->baseammort = $baseammort;

        return $this;
    }

    /**
     * Get baseammort
     *
     * @return string 
     */
    public function getBaseammort()
    {
        return $this->baseammort;
    }

    /**
     * Set dotation
     *
     * @param string $dotation
     * @return Ammortissements
     */
    public function setDotation($dotation)
    {
        $this->dotation = $dotation;

        return $this;
    }

    /**
     * Get dotation
     *
     * @return string 
     */
    public function getDotation()
    {
        return $this->dotation;
    }

      /**
     * Set annee
     *
     * @param string $annee
     * @return Ammortissements
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get annee
     *
     * @return string 
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set immobilisation
     *
     * @param \Immobilisation\ImmobilisationBundle\Entity\Immobilisation $immobilisation
     *
     * @return Ammortissements
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

    public function __toString()
    {
        return ($this->getLibelle()) ? : '';
    }
}
