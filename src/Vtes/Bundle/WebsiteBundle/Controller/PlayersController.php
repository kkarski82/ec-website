<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2015-01-12
 * Time: 22:19
 */

namespace Vtes\Bundle\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PlayersController extends Controller
{
    /**
     *  Finds and displays all registered users
     *
     * @param Request $request
     *
     * @return Response The view
     */
    public function indexAction(Request $request)
    {
        $locale = $request->getLocale();
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('VtesWebsiteBundle:User')->findAll();

        return $this->render('VtesWebsiteBundle:Players:index.html.twig', array(
            'entities' => $entities,
            'locale' => $locale
        ));
    }
}
