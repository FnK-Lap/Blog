<?php

namespace FnK\Bundle\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use FnK\Bundle\BlogBundle\Form\PostType;
use FnK\Bundle\BlogBundle\Entity\Post;

use FnK\Bundle\BlogBundle\Form\SearchType;

class PostController extends Controller
{
    public function listAction()
    {
        $posts = $this->getDoctrine()->getRepository('FnKBlogBundle:Post')->findAllPublished();

        return $this->render('FnKBlogBundle:Blog:index.html.twig', array(
            'posts' => $posts
        ));
    }

    public function newAction(Request $request)
    {
        $post = new Post();
        $form = $this->createForm(new PostType(), $post);

        $form->handleRequest($request);

        if ($form->isValid()) 
        {
            $em = $this->getDoctrine()->getManager();

            $em->persist($post);
            $em->flush();

            return $this->redirect($this->generateUrl('blog_homepage'));
        }

        return $this->render('FnKBlogBundle:Blog:newPost.html.twig', array(
            'form' =>   $form->createView()
        ));
    }

    public function searchAction(Request $request)
    {
        $form = $this->createForm(new SearchType());

        $form->handleRequest($request);

        if ($form->isValid()) 
        {
            $data = $form->getData();
            $posts = $this->getDoctrine()->getRepository('FnKBlogBundle:Post')->findByTitleAndPublished($data['title'], $data['is_published']);

            return $this->render('FnKBlogBundle:Blog:search.html.twig', array(
                'form' => $form->createView(),
                'posts' => $posts
            ));
        }
        return $this->render('FnKBlogBundle:Blog:search.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
