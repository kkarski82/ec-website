<?php

namespace Vtes\Bundle\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Vtes\Bundle\WebsiteBundle\Entity\User;
use Vtes\Bundle\WebsiteBundle\Form\UserType;

class RegistrationController extends Controller
{
    /**
     *  Displays the registration page
     *
     * @param Request $request
     *
     * @return Response The view
     */
    public function indexAction(Request $request)
    {
        $locale = $request->getLocale();
        $entity = new User();
        $form = $this->createCreateForm($entity);

        return $this->render('VtesWebsiteBundle:Registration:index.html.twig',
            array(
                'locale' => $locale,
                'entity' => $entity,
                'form' => $form->createView(),
            ));
    }

    /**
     *  Displays the registration page
     *
     * @param Request $request
     * @param integer $id
     *
     * @return Response The view
     */
    public function completeAction(Request $request, $id)
    {
        $locale = $request->getLocale();
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VtesWebsiteBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        return $this->render('VtesWebsiteBundle:Registration:complete.html.twig', array(
            'locale' => $locale,
            'entity'      => $entity,
        ));
    }

    /**
     * Creates a new User entity.
     *
     * @param Request $request
     *
     * @return Response The view
     */
    public function registerAction(Request $request)
    {
        $locale = $request->getLocale();
        $entity = new User();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('registration_complete',
                array(
                    'id' => $entity->getId()
                )));
        }

        return $this->render('VtesWebsiteBundle:Registration:index.html.twig',
            array(
                'locale' => $locale,
                'entity' => $entity,
                'form' => $form->createView(),
            ));
    }

    /**
     * Creates a form to create a User entity.
     *
     * @param User $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(User $entity)
    {
        $form = $this->createForm(new UserType(), $entity, array(
            'action' => $this->generateUrl('registration_register'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => $this->get('translator')->trans('Register')));

        return $form;
    }
}