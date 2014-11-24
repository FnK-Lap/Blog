<?php

namespace FnK\Bundle\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FnK\Bundle\BlogBundle\Entity\Post;

class LoadPostFixture extends AbstractFixture implements OrderedFixtureInterface
{
    function load(ObjectManager $manager)
    {
        $i = 1;
        while ($i <= 100) 
        {
            $post = new Post(); 
            $post->setTitle('Titre du post n°'.$i); 
            $post->setBody('Corps du post'); 
            $post->setIsPublished($i%2);
            $category = rand(1,10);
            $post->setCategory($this->getReference('category-'.$category));
            $manager->persist($post);

            $i++; 
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}