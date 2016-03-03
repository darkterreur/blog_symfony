<?php

namespace AdminBundle\Controller;



class CategorieController extends Controller
{

    /**
     * @Route("/add-categorie", name="add-categorie")
     */
    public function afficheFormAddCategorie(Request $request)
    {

        $post = new Post();
        $form = $this->createForm('AdminBundle\Form\CategorieType', $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            return $this->redirectToRoute('post_show', array('id' => $post->getId()));
        }

        return array(
            'post' => $post,
            'form' => $form->createView(),
        );
        return $this->render('AdminBundle:Resources:views:afficheFormAddCategorie.html.twig');
    }
}
