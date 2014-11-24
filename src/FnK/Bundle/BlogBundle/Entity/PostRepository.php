<?php

namespace FnK\Bundle\BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;


class PostRepository extends EntityRepository
{
    public function findAllPublished()
    {
        return $this->createQueryBuilder('post')
            ->leftJoin('post.category', 'category')
            ->addSelect('category')
            ->where('post.is_published = :published')
            ->setParameter('published', true) 
            ->getQuery()
            ->getResult();
        }
}