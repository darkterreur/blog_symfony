<?php

namespace CommonBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * PostRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PostRepository extends EntityRepository
{
    public function findFiveLast($maxResults = 5, $sort = 'dateUpdate')
    {
        return $this->createQueryBuilder('p')
            ->setMaxResults($maxResults)
            ->orderBy('p.dateUpdate')
            ->getQuery()
            ->getResult();
    }
}
