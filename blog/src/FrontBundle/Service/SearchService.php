<?php

namespace FrontBundle\Service;

use Doctrine\ORM\EntityManager;

class SearchService
{
    /**
     * SearchService constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * Cherche les posts avec les titres suivants
     *
     * @param $title Le titre recherché
     */
    public function searchPostsWithTitle($title)
    {
        return $this->em->getRepository("CommonBundle:Post")->findByTitleLike($title);
    }
}