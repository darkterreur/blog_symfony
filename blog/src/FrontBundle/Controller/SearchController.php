<?php

namespace FrontBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/search", name="search")
     * @Template
     */
    public function searchAction(Request $request)
    {
        $searchInfos = array();
        $searchService = $this->get('search.service');
        $form = $this->createForm('FrontBundle\Form\SearchType');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $searchInfos['searchResult'] = $searchService->searchPostsWithTitle($data['search']);
        }

        $searchInfos['form'] = $form->createView();

        return $searchInfos;
    }
}
