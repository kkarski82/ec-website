<?php

namespace Vtes\Bundle\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class WarsawController extends Controller
{
    /**
     *  Displays the warsaw page
     *
     * @param Request $request
     *
     * @return Response The view
     */
    public function indexAction(Request $request)
    {
        $locale = $request->getLocale();

        return $this->render('VtesWebsiteBundle:Warsaw:index.html.twig', array('locale' => $locale));
    }
}