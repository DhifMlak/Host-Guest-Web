<?php

namespace HostguestBundle\Controller;

use HostguestBundle\Entity\Sorties;
use HostguestBundle\Entity\Offres;
use HostguestBundle\Entity\Utilisateurs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Sorty controller.
 *
 */
class SortiesController extends Controller
{
    /**
     * Lists all sorty entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sorties = $em->getRepository('HostguestBundle:Sorties')->findAll();

        return $this->render('@Hostguest/Trip/Hometrip.html.twig', array(
            'sorties' => $sorties,
        ));
    }

    /**
     * Creates a new sorty entity.
     *
     */
    public function newAction(Request $request)
    {
        $sorty = new Sorties();
        $offre = new Offres();
        $form = $this->createForm('HostguestBundle\Form\SortiesType', $sorty);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $offre->setIdHote($user);
            $offre->setTypeOffre("sortie");
            $em->persist($offre);
            $em->flush($offre);
            $sorty->setId($offre);
            $em->persist($sorty);
            $em->flush($sorty);

            return $this->redirectToRoute('sorties_show', array('id' => $sorty->getId()->getId()));
        }

        return $this->render('sorties/new.html.twig', array(
            'sorty' => $sorty,
            'form' => $form->createView(),
        ));
    }
    public function sendMailAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $to = $request->request->get('adresse');
        $sortie = $em->getRepository('HostguestBundle:Sorties')->find($id);
        $message = \Swift_Message::newInstance()
            ->setSubject('Details sortie')
            ->setFrom('bairem.zalleg@esprit.tn')
            ->setTo($to)
            ->setBody("Titre : " .$sortie->getTitre() .'<br/>'. "Lieu :". $sortie->getLieu() .'<br/>'. "Description :". $sortie->getDescription() .'<br/>'. "Date :" .$sortie->getDate()->format('Y-m-d') .'<br/>'."Type Sortie :". $sortie->getTypeSortie() .'<br/>'."Conditions :". $sortie->getConditions() .'<br/>'."Nombre max de personnes :". $sortie->getNbmax(),'text/html')
            /*
             * If you also want to include a plaintext version of the message
            ->addPart(
                $this->renderView(
                    'Emails/registration.txt.twig',
                    array('name' => $name)
                ),
                'text/plain'
            )
            */
        ;
        $this->get('mailer')->send($message);
        return $this->redirectToRoute('sorties_index');
    }

    /**
     * Finds and displays a sorty entity.
     *
     */
    public function showAction(Sorties $sorty)
    {

        $em = $this->getDoctrine()->getManager();
        $evaluations = $em->getRepository('HostguestBundle:Evaluations')->findBy(array('idOffre'=>$sorty));
        return $this->render('@Hostguest/Trip/Tripdetail.html.twig', array(
            'sorty' => $sorty,
            'evaluations'=>$evaluations
        ));
    }

    /**
     * Displays a form to edit an existing sorty entity.
     *
     */
    public function editAction(Request $request,$id)
    {
        $sorty = $this->getDoctrine()->getRepository('HostguestBundle:Sorties')->find($id);
        $editForm = $this->createForm('HostguestBundle\Form\SortiesType', $sorty);
        $editForm->handleRequest($request);
        $editForm->getData();
        $this->getDoctrine()->getManager()->flush();
        //$this->getDoctrine()->getManager()->flush();
        //$sortie = $em->
        return $this->redirectToRoute('hostguest_profile');

    }

    /**
     * Deletes a sorty entity.
     *
     */
    public function deleteAction(Request $request, Sorties $sorty)
    {
        $form = $this->createDeleteForm($sorty);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sorty);
            $em->flush($sorty);
        }

        return $this->redirectToRoute('sorties_index');
    }

    public function searchAction(Request $request)
    {
        $titre = $request->request->get('titre');
        $date = $request->request->get('date');
        $lieu = $request->request->get('lieu');
        $em = $this->getDoctrine()->getManager();
        $sorties = $em->getRepository('HostguestBundle:Sorties')->searchBy($titre, $date, $lieu);
        return $this->render('@Hostguest/Trip/Hometrip.html.twig', array(
            'sorties' => $sorties,
        ));
    }

    /**
     * Creates a form to delete a sorty entity.
     *
     * @param Sorties $sorty The sorty entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Sorties $sorty)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sorties_delete', array('id' => $sorty->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
