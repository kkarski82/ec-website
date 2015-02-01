<?php

namespace Vtes\Bundle\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HotelController extends Controller
{
    /**
     *  Displays the hotel page
     *
     * @param Request $request
     *
     * @return Response The view
     */
    public function indexAction(Request $request)
    {
        $locale = $request->getLocale();

        return $this->render('VtesWebsiteBundle:Hotel:index.html.twig', array('locale' => $locale));
    }
}