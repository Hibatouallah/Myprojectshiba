<?php

namespace Ecommerce\EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * paiement
 *
 * @ORM\Table("paiement")
 * @ORM\Entity(repositoryClass="Ecommerce\EcommerceBundle\Entity\paiementRepository")
 */
class paiement
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
     * @ORM\Column(name="devise", type="string", length=3)
     */
    private $devise;

    /**
     * @var string
     *
     * @ORM\Column(name="cours", type="decimal")
     */
    private $cours;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt", type="datetime")
     */
    private $dt;


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
     * Set devise
     *
     * @param string $devise
     * @return paiement
     */
    public function setDevise($devise)
    {
        $this->devise = $devise;

        return $this;
    }

    /**
     * Get devise
     *
     * @return string 
     */
    public function getDevise()
    {
        return $this->devise;
    }

    /**
     * Set cours
     *
     * @param string $cours
     * @return paiement
     */
    public function setCours($cours)
    {
        $this->cours = $cours;

        return $this;
    }

    /**
     * Get cours
     *
     * @return string 
     */
    public function getCours()
    {
        return $this->cours;
    }

    /**
     * Set dt
     *
     * @param \DateTime $dt
     * @return paiement
     */
    public function setDt($dt)
    {
        $this->dt = $dt;

        return $this;
    }

    /**
     * Get dt
     *
     * @return \DateTime 
     */
    public function getDt()
    {
        return $this->dt;
    }
}
