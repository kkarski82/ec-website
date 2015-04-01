<?php

namespace Vtes\Bundle\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     *  Displays the homepage
     *
     * @param Request $request
     *
     * @return Response The view
     */
    public function indexAction(Request $request)
    {
        $locale = $request->getLocale();

        return $this->render('VtesWebsiteBundle:Default:index.html.twig', array('locale' => $locale));
    }
}
