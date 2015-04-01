<?php

namespace Vtes\Bundle\WebsiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Vtes\Bundle\WebsiteBundle\Entity\User;
use Vtes\Bundle\WebsiteBundle\Form\UserType;

/**
 * User controller.
 *
 */
class UserController extends Controller
{

    /**
     * Lists all User entities.
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

        return $this->render('VtesWebsiteBundle:User:index.html.twig', array(
            'entities' => $entities,
            'locale' => $locale
        ));
    }

    /**
     * Creates a new User entity.
     *
     * @param Request $request
     * @return Response the view
     */
    public function createAction(Request $request)
    {
        $locale = $request->getLocale();
        $entity = new User();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('user_show', array('id' => $entity->getId())));
        }

        return $this->render('VtesWebsiteBundle:User:new.html.twig', array(
            'entity' => $entity,
            'locale' => $locale,
            'form'   => $form->createView(),
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
            'action' => $this->generateUrl('user_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new User entity.
     *
     * @param Request $request
     * @return Response the view
     */
    public function newAction(Request $request)
    {
        $locale = $request->getLocale();
        $entity = new User();
        $form   = $this->createCreateForm($entity);

        return $this->render('VtesWebsiteBundle:User:new.html.twig', array(
            'entity' => $entity,
            'locale' => $locale,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a User entity.
     *
     * @param Request $request
     * @param mixed $id
     * @return Response the view
     *
     */
    public function showAction(Request $request, $id)
    {
        $locale = $request->getLocale();
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VtesWebsiteBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VtesWebsiteBundle:User:show.html.twig', array(
            'entity'      => $entity,
            'locale'      => $locale,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     * @param Request $request
     * @param mixed $id
     * @return Response the view
     */
    public function editAction(Request $request, $id)
    {
        $locale = $request->getLocale();
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VtesWebsiteBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VtesWebsiteBundle:User:edit.html.twig', array(
            'entity'      => $entity,
            'locale'      => $locale,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a User entity.
    *
    * @param User $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(User $entity)
    {
        $form = $this->createForm(new UserType(), $entity, array(
            'action' => $this->generateUrl('user_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing User entity.
     *
     * @param Request $request
     * @param mixed $id
     * @return Response the view
     */
    public function updateAction(Request $request, $id)
    {
        $locale = $request->getLocale();
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VtesWebsiteBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('user_edit', array('id' => $id)));
        }

        return $this->render('VtesWebsiteBundle:User:edit.html.twig', array(
            'entity'      => $entity,
            'locale'      => $locale,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a User entity.
     *
     * @param Request $request
     * @param mixed $id
     * @return Response the view
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('VtesWebsiteBundle:User')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find User entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('user'));
    }

    /**
     * Creates a form to delete a User entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    /**
     * @return Response spreadsheet
     */
    public function printAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('VtesWebsiteBundle:User')->findAll();
        $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();

        $phpExcelObject->getProperties()->setCreator('EC website')
            ->setLastModifiedBy('EC website')
            ->setTitle('Lista graczy')
            ->setSubject('Lista graczy')
            ->setDescription('Lista graczy zarejestrowanych na VTES EC 2015');
        $phpExcelObject->setActiveSheetIndex(0)
            ->setCellValue('A1', 'VEKN')
            ->setCellValue('B1', 'E-mail')
            ->setCellValue('C1', 'Imię')
            ->setCellValue('D1', 'Nazwisko')
            ->setCellValue('E1', 'Kraj')
            ->setCellValue('F1', 'Rozmiar koszulki')
            ->setCellValue('G1', 'Liczba dni')
            ->setCellValue('H1', 'Pokój')
            ->setCellValue('I1', 'Współlokator');

        $index = 2;

        /** @var User $entity */
        foreach ($entities as $entity) {
            $phpExcelObject->setActiveSheetIndex(0)
                ->setCellValue('A' . strval($index), $entity->getVekn())
                ->setCellValue('B' . strval($index), $entity->getUsername())
                ->setCellValue('C' . strval($index), $entity->getName())
                ->setCellValue('D' . strval($index), $entity->getSurname())
                ->setCellValue('E' . strval($index), $entity->getCountry())
                ->setCellValue('F' . strval($index), $entity->getShirt())
                ->setCellValue('G' . strval($index), $entity->getDays())
                ->setCellValue('H' . strval($index), $entity->getRoom())
                ->setCellValue('I' . strval($index), $entity->getRoommate());

            $index += 1;
        }

        $phpExcelObject->getActiveSheet()->setTitle('Lista graczy');
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $phpExcelObject->setActiveSheetIndex(0);

        // create the writer
        $writer = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel5');
        // create the response
        $response = $this->get('phpexcel')->createStreamedResponse($writer);
        // adding headers
        $response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
        $response->headers->set('Content-Disposition', 'attachment;filename=ec-players.xls');
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');

        return $response;
    }
}
