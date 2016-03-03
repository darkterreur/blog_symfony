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
        // $em = $this->getDoctrine()->getManager();

        // $posts = $em->getRepository('CommonBundle:Post')->findAll();

        // return $this->render('post/index.html.twig', array(
        //     'posts' => $posts,
        // ));

        // return array('postList' => array());
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
