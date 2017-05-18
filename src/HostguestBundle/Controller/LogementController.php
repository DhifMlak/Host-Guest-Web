<?php

namespace HostguestBundle\Controller;

use HostguestBundle\Entity\Logements;
use HostguestBundle\Entity\Offres;
use HostguestBundle\Entity\Utilisateurs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use HostguestBundle\Form\LogementsType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class LogementController extends Controller
{

    public function AjouterAction(Request $request)
    {



        $log = new Logements();
        $off = new Offres();
        $form = $this->createForm(LogementsType::class, $log);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $user = $this->getUser();
            $off->setIdHote($user);
            $off->setTypeOffre("logement");
           // var_dump($off);
           // var_dump($user);
            $em->persist($off);
            $em->flush();
            $log->setId($off);
            $em->persist($log);
            $em->flush();
            return $this->redirectToRoute('ajoutLogementHote');
        }
        return $this->render('HostguestBundle:Front:AjouterLogement.html.twig', array('form' => $form->createView()));


    }

    public function List1Action()
    {

        $em = $this->getDoctrine()->getManager();

        $logements = $em->getRepository('HostguestBundle:Logements')->findAll();

        return $this->render('HostguestBundle:Front:AfficherLogements.html.twig', array(
            'logements' => $logements,
        ));
    }

    public function ModifierAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $log = $em->getRepository('HostguestBundle:Logements')->find($id);
        $form = $this->createForm(LogementsType::class, $log);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($log);
            $em->flush();
            return $this->redirectToRoute('ajoutLogementHote');
        }
        return $this->render('HostguestBundle:Front:ModifierLogement.html.twig', array('form' => $form->createView()));
    }

    public function SupprimerAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $log = $em->getRepository('HostguestBundle:Logements')->find($id);
        $em->remove($log);
        $em->flush();
        return $this->redirectToRoute('afficher_Logements');
    }


    public function indexHoteAction()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $Offres = $em->getRepository('HostguestBundle:Offres')->findBy(array('idHote' => $user));

        $Logmet = array();

        foreach ($Offres as $offr) {
            $log = $em->getRepository('HostguestBundle:Logements')->findBy(array('id' => $offr));
            $Logmet[] = $log;
        }
        return $this->render('HostguestBundle:Front:AjouterLogement1.html.twig', array('Logs' => $Logmet));

    }

    public function ChercherAction(Request $request)
    {
        if ($request->isMethod('POST')) {
            $em = $this->getDoctrine()->getManager();
            $logements = $em->getRepository('HostguestBundle:Logements')->findBy(array('ville' => $request->get('ville')));
            return $this->render('HostguestBundle:Front:AfficherLogements.html.twig', array('logements' => $logements));
        }

    }

    public function MesLogementsAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $Offres = $em->getRepository('HostguestBundle:Offres')->findBy(array('idHote'=>$user));
        $Logs = array();

        foreach ($Offres as $offr) {
            $Log = $em->getRepository('HostguestBundle:Logements')->findBy(array('id'=>$offr));
            // var_dump($randos);
            $Logs[] = $Log;
        }

        return $this->render('HostguestBundle:Front:AjouterLogement1.html.twig', array('Logs' => $Logs));


    }

    public function detailAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $log = $em->getRepository('HostguestBundle:Logements')->find($id);
        return $this->render('HostguestBundle:Front:DetailLogement.html.twig', array('log' => $log));
    }

    public function ValiderAction()
    {
        $em = $this->getDoctrine()->getManager();

        $logements = $em->getRepository('HostguestBundle:Logements')->findAll();

        return $this->render('HostguestBundle:Back:LogementAdmin.html.twig', array(
            'logements' => $logements,
        ));

    }
}