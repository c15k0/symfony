<?php

namespace Formacion\DoctrineBundle\Controller;

use Formacion\DoctrineBundle\Entity\Arista;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Aristum controller.
 *
 * @Route("arista")
 */
class AristaController extends Controller
{
    /**
     * Lists all aristum entities.
     *
     * @Route("/", name="arista_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $aristas = $em->getRepository('FormacionDoctrineBundle:Arista')->findAll();

        return $this->render('arista/index.html.twig', array(
            'aristas' => $aristas,
        ));
    }

    /**
     * Creates a new aristum entity.
     *
     * @Route("/new", name="arista_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $aristum = new Arista();
        $form = $this->createForm('Formacion\DoctrineBundle\Form\AristaType', $aristum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($aristum);
            $em->flush();

            return $this->redirectToRoute('arista_show', array('id' => $aristum->getId()));
        }

        return $this->render('arista/new.html.twig', array(
            'aristum' => $aristum,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a aristum entity.
     *
     * @Route("/{id}", name="arista_show")
     * @Method("GET")
     */
    public function showAction(Arista $aristum)
    {
        $deleteForm = $this->createDeleteForm($aristum);

        return $this->render('arista/show.html.twig', array(
            'aristum' => $aristum,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing aristum entity.
     *
     * @Route("/{id}/edit", name="arista_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Arista $aristum)
    {
        $deleteForm = $this->createDeleteForm($aristum);
        $editForm = $this->createForm('Formacion\DoctrineBundle\Form\AristaType', $aristum);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('arista_edit', array('id' => $aristum->getId()));
        }

        return $this->render('arista/edit.html.twig', array(
            'aristum' => $aristum,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a aristum entity.
     *
     * @Route("/{id}", name="arista_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Arista $aristum)
    {
        $form = $this->createDeleteForm($aristum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($aristum);
            $em->flush();
        }

        return $this->redirectToRoute('arista_index');
    }

    /**
     * Creates a form to delete a aristum entity.
     *
     * @param Arista $aristum The aristum entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Arista $aristum)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('arista_delete', array('id' => $aristum->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
