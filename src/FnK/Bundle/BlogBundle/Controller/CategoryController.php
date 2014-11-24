<?php

namespace FnK\Bundle\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use FnK\Bundle\BlogBundle\Form\CategoryType;
use FnK\Bundle\BlogBundle\Entity\Category;

class CategoryController extends Controller
{
    public function newAction(Request $request)
    {
        $category = new Category();
        $form = $this->createForm(new CategoryType(), $category);

        $form->handleRequest($request);

        if ($form->isValid()) 
        {
            $em = $this->getDoctrine()->getManager();

            $em->persist($category);
            $em->flush();

            return $this->redirect($this->generateUrl('blog_homepage'));
        }

        return $this->render('FnKBlogBundle:Blog:newCategory.html.twig', array(
            'form' =>   $form->createView()
        ));
    }
}
