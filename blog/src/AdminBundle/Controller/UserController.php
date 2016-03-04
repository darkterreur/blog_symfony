<?php

namespace AdminBundle\Controller;

use CommonBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends Controller
{
    
    /**
     * Finds and displays a Post entity.
     *
     * @Route("/{id}", name="user_show")
     * @Method("GET")
     * @Template
     */
    public function userShowAction(User $user)
    {
        $deleteForm = $this->createDeleteForm($user);

        return array(
            'user' => $user,
            'delete_form' => $deleteForm->createView(),
        );
    }




    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/user-add")
     * @Method({"GET", "POST"})
     * @Template
     */
    public function userAddAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm('UserBundle\Form\UserType', $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('user_show', array('id' => $user->getId()));
        }

        return array(
            'user' => $user,
            'form' => $form->createView(),
        );
    }



    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/user-update")
     * @Method({"GET", "POST"})
     * @Template
     */
    public function userUpdateAction(Request $request, User $user)
    {
        $deleteForm = $this->createDeleteForm($user);
        $editForm = $this->createForm('AdminBundle\Form\UserType', $user);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('user_edit', array('id' => $user->getId()));
        }

        return array(
            'post' => $user,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }



     /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/user-delete")
     * @Method("DELETE")
     */
    public function userDeleteAction(Request $request, User $user)
    {
        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
        }

        return $this->redirectToRoute('admin_index');
    }

    /**
     * Creates a form to delete a User entity.
     *
     * @param User $user The Post entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(User $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_delete', array('id' => $user->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


}
