<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends Controller
{

    /**
     * @Route("/add-categorie", name="add-categorie")
     */
    public function afficheFormAddCategorie(Request $request)
    {
        return $this->render('AdminBundle:Resources:views:afficheFormAddCategorie.html.twig');
    }
}
