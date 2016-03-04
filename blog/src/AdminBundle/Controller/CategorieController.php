<?php

namespace AdminBundle\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use CommonBundle\Entity\RefCategorie;
use AdminBundle\Form\CategorieType;


class CategorieController extends Controller
{

    /**
     * @Route("/add-categorie", name="add-categorie")
     * @Template
     */
    public function afficheFormAddCategorieAction(Request $request)
    {

        $refcategorie = new RefCategorie();
        $form = $this->createForm('AdminBundle\Form\CategorieType', $refcategorie);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($refcategorie);
            $em->flush();

           // return $this->redirectToRoute('post_show', array('id' => $post->getId()));
        }

        return array(
            'post' => $refcategorie,
            'form' => $form->createView(),
        );

    }

    /**
     * Finds and displays a Categorie entity.
     *
     * @Route("/show-categorie/{id}", name="show-categorie")
     * @Method("GET")
     * @Template
     */
    public function showCategorieAction(RefCategorie $categorie)
    {
        $deleteForm = $this->createDeleteForm($categorie);

        return array(
            'categorie' => $categorie,
            'delete_form' => $deleteForm->createView(),
        );
    }



    /**
     * Displays a Categorie to edit an existing Post entity.
     *
     * @Route("edit-categorie/{id}/edit", name="categorie_edit")
     * @Method({"GET", "POST"})
     * @Template
     */
    public function editCategorieAction(Request $request, RefCategorie $categorie)
    {
        $deleteForm = $this->createDeleteForm($categorie);
        $editForm = $this->createForm('FrontBundle\Form\PostType', $categorie);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $post = $this->get('post.service')->safeInsertedData($categorie);

            $em->persist($categorie);
            $em->flush();

            return $this->redirectToRoute('post_edit', array('id' => $post->getId()));
        }

        return array(
            'post' => $categorie,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }




    /**
     * Deletes a Categorie entity.
     *
     * @Route("/delete-categorie/{id}", name="delete-categorie")
     * @Method("DELETE")
     */
    public function deleteCategorieAction(Request $request, RefCategorie $categorie)
    {
        $form = $this->createDeleteForm($categorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($categorie);
            $em->flush();
        }

        return $this->redirectToRoute('index');
    }


    /**
     * Creates a form to delete a RefCategorie entity.
     *
     * @param RefCategorie $categorie The RefCategorie entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(RefCategorie $categorie)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('delete-categorie', array('id' => $categorie->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }




}
