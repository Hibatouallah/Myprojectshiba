<?php

namespace Immobilisation\ImmobilisationBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ImmobilisationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ImmobilisationRepository extends EntityRepository
{
	public function calculTVA($tva,$id)
    {
        $qb = $this->createQueryBuilder('u')
                ->update('montantTTC')
                ->set('montantTTC = montantTTC*tva')
                ->Where('u.id =:array')
                ->setParameter('array', $id);

        return $qb->getQuery()->getResult();
    }
}
