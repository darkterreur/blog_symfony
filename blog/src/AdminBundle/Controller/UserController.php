<?php

namespace AdminBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/user-add")
     * @Template
     */
    public function userAddAction()
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
     * @Template
     */
    public function userUpdateAction()
    {

    }



     /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/user-delete")
     * @Template
     */
    public function userDeleteAction()
    {

    }



}
