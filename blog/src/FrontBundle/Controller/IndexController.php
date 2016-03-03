<?php

namespace FrontBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/", name="index")
     * @Template
     */
    public function indexAction()
    {
        $this->get('post.service');
        $em = $this->getDoctrine()->getManager();

        $posts = $em->getRepository('CommonBundle:Post')->findFiveLast();

        return array(
            'posts' => $posts,
        );
    }
}
