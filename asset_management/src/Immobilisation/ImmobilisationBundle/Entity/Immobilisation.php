<?php

namespace Immobilisation\ImmobilisationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Immobilisation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Immobilisation\ImmobilisationBundle\Repository\ImmobilisationRepository")
 */
class Immobilisation
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
     * @ORM\ManyToOne(targetEntity="Immobilisation\ImmobilisationBundle\Entity\Commande")
     * @ORM\JoinColumn(nullable=true)
     */
    private $commande;
    /**
     * @ORM\ManyToOne(targetEntity="Immobilisation\ImmobilisationBundle\Entity\utilisateurimmo")
     * @ORM\JoinColumn(nullable=true)
     */
    private $utilisateurimmo;

    /**
     * @ORM\ManyToOne(targetEntity="Immobilisation\ImmobilisationBundle\Entity\Ammortissements")
     * @ORM\JoinColumn(nullable=true)
     */
    private $ammortissements;

    /**
     * @ORM\ManyToOne(targetEntity="Immobilisation\ImmobilisationBundle\Entity\devision")
     * @ORM\JoinColumn(nullable=true)
     */
    private $devision;

     /**
     * @ORM\ManyToOne(targetEntity="Immobilisation\ImmobilisationBundle\Entity\Services")
     * @ORM\JoinColumn(nullable=true)
     */
    private $services;

    /**
     * @ORM\ManyToOne(targetEntity="Immobilisation\ImmobilisationBundle\Entity\Bureau")
     * @ORM\JoinColumn(nullable=true)
     */
    private $bureau;

    /**
     * @ORM\ManyToOne(targetEntity="Immobilisation\ImmobilisationBundle\Entity\Site")
     * @ORM\JoinColumn(nullable=true)
     */
    private $site;

    /**
     * @ORM\ManyToOne(targetEntity="Immobilisation\ImmobilisationBundle\Entity\Marque")
     * @ORM\JoinColumn(nullable=true)
     */
    private $marque;

    /**
     * @ORM\ManyToOne(targetEntity="Immobilisation\ImmobilisationBundle\Entity\Sousfamille")
     * @ORM\JoinColumn(nullable=true)
     */
    private $sousfamille;

    /**
     * @ORM\ManyToOne(targetEntity="Immobilisation\ImmobilisationBundle\Entity\TVA")
     * @ORM\JoinColumn(nullable=true)
     */
    private $TVA;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="refdecision", type="string", length=255)
     */
    private $refdecision;

    /**
     * @var string
     *
     * @ORM\Column(name="refachat", type="string", length=255)
     */
    private $refachat;


    /**
     * @var string
     *
     * @ORM\Column(name="reforme", type="string", length=255)
     */
    private $reforme;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datereforme", type="datetime")
     */
    private $datereforme;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datevente", type="datetime")
     */
    private $datevente;

    /**
     * @var string
     *
     * @ORM\Column(name="prixcession", type="decimal")
     */
    private $prixcession;

    /**
     * @var string
     *
     * @ORM\Column(name="naturedepropriete", type="string", length=255)
     */
    private $naturedepropriete;

    /**
     * @var string
     *
     * @ORM\Column(name="comptecomptable", type="string", length=255)
     */
    private $comptecomptable;

    /**
     * @var integer
     *
     * @ORM\Column(name="idcomptable", type="integer")
     */
    private $idcomptable;

    /**
     * @var string
     *
     * @ORM\Column(name="dureeamort", type="string", length=255)
     */
    private $dureeamort;

    /**
     * @var string
     *
     * @ORM\Column(name="B_NOME", type="string", length=255)
     */
    private $Bnome;

    /**
     * @var string
     *
     * @ORM\Column(name="B_MATR", type="string", length=255)
     */
    private $Bmatr;

    /**
     * @var string
     *
     * @ORM\Column(name="Service_update", type="string", length=255)
     */
    private $ServiceMaj;

    /**
     * @var string
     *
     * @ORM\Column(name="Zone", type="string", length=255)
     */
    private $Zone;

    /**
     * @var string
     *
     * @ORM\Column(name="codeanalytique", type="string", length=255)
     */
    private $codeanalytique;

    /**
     * @var string
     *
     * @ORM\Column(name="activite", type="string", length=255)
     */
    private $activite;

    /**
     * @var string
     *
     * @ORM\Column(name="projet", type="string", length=255)
     */
    private $projet;

    /**
     * @var string
     *
     * @ORM\Column(name="designation", type="string", length=255)
     */
    private $designation;

    /**
     * @var string
     *
     * @ORM\Column(name="designationsuite", type="string", length=255)
     */
    private $designationsuite;

    /**
     * @var string
     *
     * @ORM\Column(name="Bureau_update", type="string", length=255)
     */
    private $BureauMaj;

    /**
     * @var string
     *
     * @ORM\Column(name="Zone_update", type="string", length=255)
     */
    private $ZoneMaj;

    /**
     * @var string
     *
     * @ORM\Column(name="budget", type="string", length=255)
     */
    private $budget;

    /**
     * @var string
     *
     * @ORM\Column(name="subdivdri", type="string", length=255)
     */
    private $subdivdri;

    /**
     * @var integer
     *
     * @ORM\Column(name="code", type="integer")
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateacquisition", type="datetime")
     */
    private $dateacquisition;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datemiseenservice", type="datetime")
     */
    private $datemiseenservice;

    /**
     * @var string
     *
     * @ORM\Column(name="localisation", type="string", length=255)
     */
    private $localisation;

    /**
     * @var integer
     *
     * @ORM\Column(name="codebarre", type="bigint")
     */
    private $codebarre;

    /**
     * @var string
     *
     * @ORM\Column(name="montantHT", type="decimal")
     */
    private $montantHT;

    /**
     * @var string
     *
     * @ORM\Column(name="montantTTC", type="decimal",nullable=true)
     */
    private $montantTTC;

    /**
     * @var string
     *
     * @ORM\Column(name="modele", type="string", length=255)
     */
    private $modele;

    /**
     * @var string
     *
     * @ORM\Column(name="cumulammort", type="decimal")
     */
    private $cumulammort;

    /**
     * @var integer
     *
     * @ORM\Column(name="seriecomptable", type="bigint")
     */
    private $seriecomptable;

    /**
     * @var string
     *
     * @ORM\Column(name="batiment", type="string", length=255)
     */
    private $batiment;

    /**
     * @var string
     *
     * @ORM\Column(name="etage", type="string", length=255)
     */
    private $etage;

    /**
     * @var integer
     *
     * @ORM\Column(name="numfacture", type="integer")
     */
    private $numfacture;

    /**
     * @var datetime
     *
     * @ORM\Column(name="datefacture", type="datetime")
     */
    private $datefacture;

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
     * Set designation
     *
     * @param string $designation
     * @return Immobilisation
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }
   
    /**
     * Get designation
     *
     * @return string 
     */
    public function getDesignation()
    {
        return $this->designation;
    }


    /**
     * Set Bnome
     *
     * @param string $Bnome
     * @return Immobilisation
     */
    public function setBnome($Bnome)
    {
        $this->Bnome = $Bnome;

        return $this;
    }
   
    /**
     * Get Bmatr
     *
     * @return string 
     */
    public function getBnome()
    {
        return $this->Bmatr;
    }

    /**
     * Set Bmatr
     *
     * @param string $Bmatr
     * @return Immobilisation
     */
    public function setBmatr($Bmatr)
    {
        $this->Bmatr = $Bmatr;

        return $this;
    }

    /**
     * Get Bmatr
     *
     * @return string 
     */
    public function getBmatr()
    {
        return $this->Bmatr;
    }

    /**
     * Set refdecision
     *
     * @param string $refdecision
     * @return Immobilisation
     */
    public function setRefdecision($refdecision)
    {
        $this->refdecision = $refdecision;

        return $this;
    }

     /**
     * Get refdecision
     *
     * @return string 
     */
    public function getRefdecision()
    {
        return $this->refdecision;
    }

    /**
     * Get reforme
     *
     * @return string 
     */
    public function getReforme()
    {
        return $this->reforme;
    }

    /**
     * Set datereforme
     *
     * @param string $datereforme
     * @return Immobilisation
     */
    public function setDatereforme($datereforme)
    {
        $this->datereforme = $datereforme;

        return $this;
    }

    /**
     * Get datereforme
     *
     * @return string 
     */
    public function getDatereforme()
    {
        return $this->datereforme;
    }

    /**
     * Set datevente
     *
     * @param string $datereforme
     * @return Immobilisation
     */
    public function setDatevente($datevente)
    {
        $this->datevente = $datevente;

        return $this;
    }

    /**
     * Get datevente
     *
     * @return string 
     */
    public function getDatevente()
    {
        return $this->datevente;
    }

    /**
     * Set datevente
     *
     * @param string $datereforme
     * @return Immobilisation
     */
    public function setPrixcession($prixcession)
    {
        $this->prixcession = $prixcession;

        return $this;
    }

    /**
     * Get prixcession
     *
     * @return string 
     */
    public function getPrixcession()
    {
        return $this->prixcession;
    }

    /**
     * Set naturedepropriete
     *
     * @param string $datereforme
     * @return Immobilisation
     */
    public function setNaturedepropriete($naturedepropriete)
    {
        $this->naturedepropriete = $naturedepropriete;

        return $this;
    }

    /**
     * Get naturedepropriete
     *
     * @return string 
     */
    public function getNaturedepropriete()
    {
        return $this->naturedepropriete;
    }

    /**
     * Set comptecomptable
     *
     * @param string $comptecomptable
     * @return Immobilisation
     */
    public function setComptecomptable($comptecomptable)
    {
        $this->comptecomptable = $comptecomptable;

        return $this;
    }

    /**
     * Get comptecomptable
     *
     * @return string 
     */
    public function getComptecomptable()
    {
        return $this->comptecomptable;
    }

    /**
     * Set idcomptable
     *
     * @param string $idcomptable
     * @return Immobilisation
     */
    public function setIdcomptable($idcomptable)
    {
        $this->idcomptable = $idcomptable;

        return $this;
    }

    /**
     * Get idcomptable
     *
     * @return string 
     */
    public function getIdcomptable()
    {
        return $this->idcomptable;
    }

    /**
     * Set ServiceMaj
     *
     * @param string $ServiceMaj
     * @return Immobilisation
     */
    public function setServiceMaj($ServiceMaj)
    {
        $this->ServiceMaj = $ServiceMaj;

        return $this;
    }

    /**
     * Get ServiceMaj
     *
     * @return string 
     */
    public function getServiceMaj()
    {
        return $this->ServiceMaj;
    }

    /**
     * Set BureauMaj
     *
     * @param string $BureauMaj
     * @return Immobilisation
     */
    public function setBureauMaj($BureauMaj)
    {
        $this->BureauMaj = $BureauMaj;

        return $this;
    }

    /**
     * Get BureauMaj
     *
     * @return string 
     */
    public function getBureauMaj()
    {
        return $this->BureauMaj;
    }

    /**
     * Set ZoneMaj
     *
     * @param string $ZoneMaj
     * @return Immobilisation
     */
    public function setZoneMaj($ZoneMaj)
    {
        $this->ZoneMaj = $ZoneMaj;

        return $this;
    }

    /**
     * Get ZoneMaj
     *
     * @return string 
     */
    public function getZoneMaj()
    {
        return $this->ZoneMaj;
    }


    /**
     * Set Zone
     *
     * @param string $Zone
     * @return Immobilisation
     */
    public function setZone($Zone)
    {
        $this->Zone = $Zone;

        return $this;
    }

    /**
     * Get Zone
     *
     * @return string 
     */
    public function getZone()
    {
        return $this->Zone;
    }


    /**
     * Set codeanalytique
     *
     * @param string $codeanalytique
     * @return Immobilisation
     */
    public function setcodeanalytique($codeanalytique)
    {
        $this->codeanalytique = $codeanalytique;

        return $this;
    }

    /**
     * Get codeanalytique
     *
     * @return string 
     */
    public function getcodeanalytique()
    {
        return $this->codeanalytique;
    }


    /**
     * Set activite
     *
     * @param string $activite
     * @return Immobilisation
     */
    public function setactivite($activite)
    {
        $this->activite = $activite;

        return $this;
    }

    /**
     * Get activite
     *
     * @return string 
     */
    public function getactivite()
    {
        return $this->activite;
    }


    /**
     * Set projet
     *
     * @param string $projet
     * @return Immobilisation
     */
    public function setprojet($projet)
    {
        $this->projet = $projet;

        return $this;
    }

    /**
     * Get projet
     *
     * @return string 
     */
    public function getprojet()
    {
        return $this->projet;
    }


    /**
     * Set designationsuite
     *
     * @param string $designationsuite
     * @return Immobilisation
     */
    public function setDesignationsuite($designationsuite)
    {
        $this->designationsuite = $designationsuite;

        return $this;
    }

    /**
     * Get designationsuite
     *
     * @return string 
     */
    public function getDesignationsuite()
    {
        return $this->designationsuite;
    }

    /**
     * Set refachat
     *
     * @param string $refachat
     * @return Immobilisation
     */
    public function setRefachat($refachat)
    {
        $this->refachat = $refachat;

        return $this;
    }

    /**
     * Get refachat
     *
     * @return string 
     */
    public function getRefachat()
    {
        return $this->refachat;
    }

    /**
     * Set annee
     *
     * @param string $annee
     * @return Immobilisation
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
     * Set budget
     *
     * @param string $budget
     * @return Immobilisation
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;

        return $this;
    }

    /**
     * Get budget
     *
     * @return string 
     */
    public function getBudget()
    {
        return $this->budget;
    }


    /**
     * Set Commune
     *
     * @param string $Commune
     * @return Immobilisation
     */
    public function setCommune($Commune)
    {
        $this->Commune = $Commune;

        return $this;
    }

    /**
     * Get Commune
     *
     * @return string 
     */
    public function getCommune()
    {
        return $this->Commune;
    }

    /**
     * Set province
     *
     * @param string $province
     * @return Immobilisation
     */
    public function setProvince($province)
    {
        $this->province = $province;

        return $this;
    }

    /**
     * Get province
     *
     * @return string 
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Set subdivdri
     *
     * @param string $subdivdri
     * @return Immobilisation
     */
    public function setSubdivdri($subdivdri)
    {
        $this->subdivdri = $subdivdri;

        return $this;
    }

    /**
     * Get subdivdri
     *
     * @return string t
     */
    public function getSubdivdri()
    {
        return $this->subdivdri;
    }


    /**
     * Set reforme
     *
     * @param string $reforme
     * @return Immobilisation
     */
    public function setReforme($reforme)
    {
        $this->reforme = $reforme;

        return $this;
    }
    /**
     * Set numfacture
     *
     * @param string $numfacture
     * @return Immobilisation
     */
    public function setNumfacture($numfacture)
    {
        $this->numfacture = $numfacture;

        return $this;
    }

    /**
     * Get numfacture
     *
     * @return string 
     */
    public function getNumfacture()
    {
        return $this->numfacture;
    }

    /**
     * Set dureeamort
     *
     * @param string $dureeamort
     * @return Immobilisation
     */
    public function setDureeamort($dureeamort)
    {
        $this->dureeamort = $dureeamort;

        return $this;
    }

    /**
     * Get dureeamort
     *
     * @return string 
     */
    public function getDureeamort()
    {
        return $this->dureeamort;
    }
    /**
     * Set datefacture
     *
     * @param string $datefacture
     * @return Immobilisation
     */
    public function setDatefacture($datefacture)
    {
        $this->datefacture = $datefacture;

        return $this;
    }

    /**
     * Get datefacture
     *
     * @return string 
     */
    public function getDatefacture()
    {
        return $this->datefacture;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Immobilisation
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
     * Set code
     *
     * @param integer $code
     * @return Immobilisation
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return integer 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return Immobilisation
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
     * Set matricule
     *
     * @param integer $matricule
     * @return Immobilisation
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get matricule
     *
     * @return integer 
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set dateacquisition
     *
     * @param \DateTime $dateacquisition
     * @return Immobilisation
     */
    public function setDateacquisition($dateacquisition)
    {
        $this->dateacquisition = $dateacquisition;

        return $this;
    }

    /**
     * Get dateacquisition
     *
     * @return \DateTime 
     */
    public function getDateacquisition()
    {
        return $this->dateacquisition;
    }

    
    /**
     * Set datemiseenservice
     *
     * @param \DateTime $datemiseenservice
     * @return Immobilisation
     */
    public function setDatemiseenservice($datemiseenservice)
    {
        $this->datemiseenservice = $datemiseenservice;

        return $this;
    }

    /**
     * Get datemiseenservice
     *
     * @return \DateTime 
     */
    public function getDatemiseenservice()
    {
        return $this->datemiseenservice;
    }

    /**
     * Set localisation
     *
     * @param string $localisation
     * @return Immobilisation
     */
    public function setLocalisation($localisation)
    {
        $this->localisation = $localisation;

        return $this;
    }

    /**
     * Get localisation
     *
     * @return string 
     */
    public function getLocalisation()
    {
        return $this->localisation;
    }

    /**
     * Set codebarre
     *
     * @param integer $codebarre
     * @return Immobilisation
     */
    public function setCodebarre($codebarre)
    {
        $this->codebarre = $codebarre;

        return $this;
    }

    /**
     * Get codebarre
     *
     * @return integer 
     */
    public function getCodebarre()
    {
        return $this->codebarre;
    }

    /**
     * Set montantHT
     *
     * @param string $montantHT
     * @return Immobilisation
     */
    public function setMontantHT($montantHT)
    {
        $this->montantHT = $montantHT;

        return $this;
    }

    /**
     * Get montantHT
     *
     * @return string 
     */
    public function getMontantHT()
    {
        return $this->montantHT;
    }

    /**
     * Set montantTTC
     *
     * @param string $montantTTC
     * @return Immobilisation
     */
    public function setMontantTTC($montantTTC)
    {
        $this->montantTTC = $montantTTC;

        return $this;
    }

    /**
     * Get montantTTC
     *
     * @return string 
     */
    public function getMontantTTC()
    {
        return $this->montantTTC;
    }

    /**
     * Set modele
     *
     * @param string $modele
     * @return Immobilisation
     */
    public function setModele($modele)
    {
        $this->modele = $modele;

        return $this;
    }

    /**
     * Get modele
     *
     * @return string 
     */
    public function getModele()
    {
        return $this->modele;
    }

    
    /**
     * Set cumulammort
     *
     * @param string $cumulammort
     * @return Immobilisation
     */
    public function setCumulammort($cumulammort)
    {
        $this->cumulammort = $cumulammort;

        return $this;
    }

    /**
     * Get cumulammort
     *
     * @return string 
     */
    public function getCumulammort()
    {
        return $this->cumulammort;
    }

    /**
     * Set seriecomptable
     *
     * @param integer $seriecomptable
     * @return Immobilisation
     */
    public function setSeriecomptable($seriecomptable)
    {
        $this->seriecomptable = $seriecomptable;

        return $this;
    }

    /**
     * Get seriecomptable
     *
     * @return integer 
     */
    public function getSeriecomptable()
    {
        return $this->seriecomptable;
    }

    /**
     * Set batiment
     *
     * @param string $batiment
     * @return Immobilisation
     */
    public function setBatiment($batiment)
    {
        $this->batiment = $batiment;

        return $this;
    }

    /**
     * Get batiment
     *
     * @return string 
     */
    public function getBatiment()
    {
        return $this->batiment;
    }

    /**
     * Set etage
     *
     * @param string $etage
     * @return Immobilisation
     */
    public function setEtage($etage)
    {
        $this->etage = $etage;

        return $this;
    }

    /**
     * Get etage
     *
     * @return string 
     */
    public function getEtage()
    {
        return $this->etage;
    }

    /**
     * Set commande
     *
     * @param \Immobilisation\ImmobilisationBundle\Entity\Commande $commande
     *
     * @return Immobilisation
     */
    public function setCommande(\Immobilisation\ImmobilisationBundle\Entity\Commande $commande = null)
    {
        $this->commande = $commande;

        return $this;
    }

    /**
     * Get commande
     *
     * @return \Immobilisation\ImmobilisationBundle\Entity\Commande
     */
    public function getCommande()
    {
        return $this->commande;
    }

    /**
     * Set utilisateurimmo
     *
     * @param \Immobilisation\ImmobilisationBundle\Entity\utilisateurimmo $utilisateurimmo
     *
     * @return Immobilisation
     */
    public function setUtilisateurimmo(\Immobilisation\ImmobilisationBundle\Entity\utilisateurimmo $utilisateurimmo = null)
    {
        $this->utilisateurimmo = $utilisateurimmo;

        return $this;
    }

    /**
     * Get utilisateurimmo
     *
     * @return \Immobilisation\ImmobilisationBundle\Entity\utilisateurimmo
     */
    public function getUtilisateurimmo()
    {
        return $this->utilisateurimmo;
    }

    /**
     * Set ammortissements
     *
     * @param \Immobilisation\ImmobilisationBundle\Entity\Ammortissements $ammortissements
     *
     * @return Immobilisation
     */
    public function setAmmortissements(\Immobilisation\ImmobilisationBundle\Entity\Ammortissements $ammortissements = null)
    {
        $this->ammortissements = $ammortissements;

        return $this;
    }

    /**
     * Get ammortissements
     *
     * @return \Immobilisation\ImmobilisationBundle\Entity\Ammortissements
     */
    public function getAmmortissements()
    {
        return $this->ammortissements;
    }

    /**
     * Set devision
     *
     * @param \Immobilisation\ImmobilisationBundle\Entity\devision $devision
     *
     * @return Immobilisation
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

    /**
     * Set services
     *
     * @param \Immobilisation\ImmobilisationBundle\Entity\Services $services
     *
     * @return Immobilisation
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

    /**
     * Set bureau
     *
     * @param \Immobilisation\ImmobilisationBundle\Entity\Bureau $bureau
     *
     * @return Immobilisation
     */
    public function setBureau(\Immobilisation\ImmobilisationBundle\Entity\Bureau $bureau = null)
    {
        $this->bureau = $bureau;

        return $this;
    }

    /**
     * Get bureau
     *
     * @return \Immobilisation\ImmobilisationBundle\Entity\Bureau
     */
    public function getBureau()
    {
        return $this->bureau;
    }

    /**
     * Set site
     *
     * @param \Immobilisation\ImmobilisationBundle\Entity\Site $site
     *
     * @return Immobilisation
     */
    public function setSite(\Immobilisation\ImmobilisationBundle\Entity\Site $site = null)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site
     *
     * @return \Immobilisation\ImmobilisationBundle\Entity\Site
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Set marque
     *
     * @param \Immobilisation\ImmobilisationBundle\Entity\Marque $marque
     *
     * @return Immobilisation
     */
    public function setMarque(\Immobilisation\ImmobilisationBundle\Entity\Marque $marque = null)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return \Immobilisation\ImmobilisationBundle\Entity\Marque
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set sousfamille
     *
     * @param \Immobilisation\ImmobilisationBundle\Entity\Sousfamille $sousfamille
     *
     * @return Immobilisation
     */
    public function setSousfamille(\Immobilisation\ImmobilisationBundle\Entity\Sousfamille $sousfamille = null)
    {
        $this->sousfamille = $sousfamille;

        return $this;
    }

    /**
     * Get sousfamille
     *
     * @return \Immobilisation\ImmobilisationBundle\Entity\Sousfamille
     */
    public function getSousfamille()
    {
        return $this->sousfamille;
    }
   
    public function __toString()
    {
        return ($this->getLibelle()) ? : '';
    }

    /**
     * Set tVA
     *
     * @param \Immobilisation\ImmobilisationBundle\Entity\TVA $tVA
     *
     * @return Immobilisation
     */
    public function setTVA(\Immobilisation\ImmobilisationBundle\Entity\TVA $tVA = null)
    {
        $this->TVA = $tVA;

        return $this;
    }

    /**
     * Get tVA
     *
     * @return \Immobilisation\ImmobilisationBundle\Entity\TVA
     */
    public function getTVA()
    {
        return $this->TVA;
    }

    public function calculTVA()
    {
        echo 'HIIIIIIIIIIIIIIIIIIIIIIIIIIII';
    }
}
