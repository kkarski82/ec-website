<?php

namespace Vtes\Bundle\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PrizesController extends Controller
{
    /**
     *  Displays the prizes page
     *
     * @param Request $request
     *
     * @return Response The view
     */
    public function indexAction(Request $request)
    {
        $locale = $request->getLocale();

        return $this->render('VtesWebsiteBundle:Prizes:index.html.twig', array('locale' => $locale));
    }
}