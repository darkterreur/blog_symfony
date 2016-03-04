<?php

namespace CommonBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use CommonBundle\Entity\RefCategorie;

class LoadCategorieData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $categorieHighTech = new RefCategorie();
        $categorieHighTech->setTitle('High Tech');

        $categorieMobile = new RefCategorie();
        $categorieMobile->setTitle('Mobile');

        $categoriePc = new RefCategorie();
        $categoriePc->setTitle('PC');

        $manager->persist($categorieHighTech);
        $manager->persist($categorieMobile);
        $manager->persist($categoriePc);

        $manager->flush();
    }
}