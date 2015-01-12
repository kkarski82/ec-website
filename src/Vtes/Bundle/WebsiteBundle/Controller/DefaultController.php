<?php

namespace Vtes\Bundle\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $locale = $request->getLocale();
        $router = $this->get('router');
        $url = $router->generate('vtes_website_homepage', array('_locale' => $locale));

        return new RedirectResponse($url);
    }

    public function homeAction()
    {
        return $this->render('VtesWebsiteBundle:Default:index.html.twig');
    }
}
