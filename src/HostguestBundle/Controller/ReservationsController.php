<?php

namespace HostguestBundle\Controller;
use HostguestBundle\Entity\Offres;
use HostguestBundle\Entity\Packs;
use HostguestBundle\Entity\Reservations;
use HostguestBundle\Entity\Utilisateurs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Reservation controller.
 *
 */
class ReservationsController extends Controller
{
    /**
     * Lists all reservation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reservations = $em->getRepository('HostGuestReservationBundle:Reservations')->findAll();

        return $this->render('HostguestBundle:reservations:index.html.twig', array(
            'reservations' => $reservations,
        ));
    }

    /**
     * Creates a new reservation entity.
     *
     */
    public function newAction(Request $request, $idOffre)
    {
        $reservation = new Reservations();
        $form = $this->createForm('HostguestBundle\Form\ReservationsType', $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $offre = $em->getRepository('HostguestBundle:Offres')->find($idOffre);
            $reservation->setIdOffre($offre);
            if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
            {
                $user = $this->container->get('security.token_storage')->getToken()->getUser();

            }
            $reservation->setIdVoyageur($user);
            $em->persist($reservation);
            $em->flush($reservation);

            return $this->redirectToRoute('reservations_show', array('id' => $reservation->getId()));
        }

        return $this->render('HostguestBundle:reservations:new.html.twig', array(
            'reservation' => $reservation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a reservation entity.
     *
     */
    public function showAction(Reservations $reservation)
    {
        $deleteForm = $this->createDeleteForm($reservation);

        return $this->render('HostguestBundle:reservations:show.html.twig', array(
            'reservation' => $reservation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reservation entity.
     *
     */
    public function editAction(Request $request, Reservations $reservation)
    {
        $deleteForm = $this->createDeleteForm($reservation);
        $editForm = $this->createForm('HostguestBundle\Form\ReservationsType', $reservation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reservations_edit', array('id' => $reservation->getId()));
        }

        return $this->render('HostguestBundle:reservations:edit.html.twig', array(
            'reservation' => $reservation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a reservation entity.
     *
     */
    public function deleteAction(Request $request, Reservations $reservation)
    {
        $form = $this->createDeleteForm($reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reservation);
            $em->flush();
        }

        return $this->redirectToRoute('reservations_index');
    }

    /**
     * Creates a form to delete a reservation entity.
     *
     * @param Reservations $reservation The reservation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Reservations $reservation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reservations_delete', array('id' => $reservation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
