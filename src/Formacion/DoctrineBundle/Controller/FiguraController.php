<?php

namespace Formacion\DoctrineBundle\Controller;

use Formacion\DoctrineBundle\Entity\Figura;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Figura controller.
 *
 * @Route("figura")
 */
class FiguraController extends Controller
{
    /**
     * Lists all figura entities.
     *
     * @Route("/", name="figura_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $figuras = $em->getRepository('FormacionDoctrineBundle:Figura')->findAll();

        return $this->render('figura/index.html.twig', array(
            'figuras' => $figuras,
        ));
    }

    /**
     * Creates a new figura entity.
     *
     * @Route("/new", name="figura_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $figura = new Figura();
        $form = $this->createForm('Formacion\DoctrineBundle\Form\FiguraType', $figura);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($figura);
            $em->flush();

            return $this->redirectToRoute('figura_show', array('id' => $figura->getId()));
        }

        return $this->render('figura/new.html.twig', array(
            'figura' => $figura,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a figura entity.
     *
     * @Route("/{id}", name="figura_show")
     * @Method("GET")
     */
    public function showAction(Figura $figura)
    {
        $deleteForm = $this->createDeleteForm($figura);

        return $this->render('figura/show.html.twig', array(
            'figura' => $figura,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing figura entity.
     *
     * @Route("/{id}/edit", name="figura_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Figura $figura)
    {
        $deleteForm = $this->createDeleteForm($figura);
        $editForm = $this->createForm('Formacion\DoctrineBundle\Form\FiguraType', $figura);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('figura_edit', array('id' => $figura->getId()));
        }

        return $this->render('figura/edit.html.twig', array(
            'figura' => $figura,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a figura entity.
     *
     * @Route("/{id}", name="figura_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Figura $figura)
    {
        $form = $this->createDeleteForm($figura);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($figura);
            $em->flush();
        }

        return $this->redirectToRoute('figura_index');
    }

    /**
     * Creates a form to delete a figura entity.
     *
     * @param Figura $figura The figura entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Figura $figura)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('figura_delete', array('id' => $figura->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
