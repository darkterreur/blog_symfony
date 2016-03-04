<?php

namespace FrontBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/", name="index")
     * @Template
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $paginator  = $this->get('knp_paginator');

        $postsQuery = $em->getRepository('CommonBundle:Post')->getQueryForAll();

        $pagination = $paginator->paginate(
            $postsQuery,
            $request->query->getInt('page', 1),
            3
        );

        return array(
            'pagination' => $pagination
        );
    }
}
