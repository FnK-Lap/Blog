<?php

namespace FnK\Bundle\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FnK\Bundle\BlogBundle\Entity\Category;

class LoadCategoryFixture extends AbstractFixture implements OrderedFixtureInterface
{
    function load(ObjectManager $manager)
    {
        $i = 1;
        while ($i <= 10) 
        {
            $category = new Category(); 
            $category->setName('Category n°'.$i); 
            $manager->persist($category);

            $this->addReference('category-'.$i, $category);

            $i++; 
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}