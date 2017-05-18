<?php

namespace HostguestBundle\Controller;

use HostguestBundle\Entity\Offres;
use HostguestBundle\Entity\Randonnees;
use HostguestBundle\Entity\Utilisateurs;
use HostguestBundle\Form\RandonneesType;
use HostguestBundle\Repository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RandonneeController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    public function detailAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $rando=$em->getRepository('HostguestBundle:Randonnees')->find($id);
        return $this->render('HostguestBundle:Front:randoDetail.html.twig',array('rando'=>$rando));
    }
    public function ajoutAction(Request $request){
        $rando = new Randonnees();
        $form=$this->createForm(RandonneesType::class,$rando);
        $form->handleRequest($request);
        if ($form->isValid()){

            $em=$this->getDoctrine()->getManager();
            $em->persist($rando);
            $em->flush();
            return $this->redirectToRoute('MesRando');

        }
        return $this->render('@HostGuestRandonnee/Front/Ajout.html.twig',array(
            'form'=>$form->createView()
        ));
    }

    public function ajouterAction(Request $request)
    {
        $rando = new Randonnees();
        if ($request->isMethod('POST')) {
            $user = new Utilisateurs();
            $user = $this->get('security.token_storage')->getToken()->getUser();

            $offre = new Offres();
            $offre->setIdHote($user);
            $offre->setTypeOffre('randonnee');

            $em = $this->getDoctrine()->getManager();
            $em->persist($offre);
            $em->flush();

            $offerss = $em->getRepository('HostguestBundle:Offres')->findAll();
            foreach ($offerss as $offerss){

                $lastID = $offerss;
            }

            $offre->setId($lastID);

            $rando->setId($offre);
            $rando->setTitre($request->get('titre'));
            $rando->setLieu($request->get('lieu'));
            $rando->setNbmax($request->get('nbMax'));
            $rando->setLieuRencontre($request->get('lieuRencontre'));
            $rando->setPrix($request->get('prix'));
            $rando->setHeureRencontre($request->get('heureRencontre'));
            $rando->setDescription($request->get('description'));
            $rando->setEtat(0);
           // $rando->setPhoto($request->get('photo'));


            $em->persist($rando);
            $em->flush();
            return $this->redirectToRoute('MesRando');
        }

        return $this->render('HostguestBundle:Front:ajouter.html.twig');
    }
    public function listAction()
    {
        $em=$this->getDoctrine()->getManager();
        $randos=$em->getRepository('HostguestBundle:Randonnees')->findBy(array('etat'=>1));
        //$randos=$em->getRepository('HostguestBundle:Randonnees')->findAll();

        return $this->render('HostguestBundle:Front:list.html.twig',array('randos'=>$randos));
    }
    public function ChercherAction(Request $request)
    {
        if ($request->isMethod('POST')) {
            $em=$this->getDoctrine()->getManager();
            $randos=$em->getRepository('HostguestBundle:Randonnees')->findBy(array('lieu' => $request->get('lieu'),'etat' =>'1'));
            return $this->render('HostguestBundle:Front:list.html.twig',array('randos'=>$randos));
        }

    }
    public function MesRandoAction(){
        $user = $this->get('security.token_storage')->getToken()->getUser();

        $em=$this->getDoctrine()->getManager();
      $Offres=$em->getRepository('HostguestBundle:Offres')->findBy(array('idHote'=>$user));

        $randos = array();

        foreach ($Offres as $Offres){
            $rando=$em->getRepository('HostguestBundle:Randonnees')->findBy(array('id'=>$Offres->getId(),'etat'=>1));
           // var_dump($randos);
            $randos[]=$rando;
        }

        return $this->render('HostguestBundle:Front:mesRando.html.twig',array('randos'=>$randos));


    }
    public function SupprimerAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $rando=$em->getRepository('HostguestBundle:Randonnees')->find($id);
        $offre=$em->getRepository('HostguestBundle:Offres')->find($id);
        $em->remove($rando);
        $em->flush();
        $em->remove($offre);
        $em->flush();
        return $this->redirectToRoute('MesRando');
    }
    public function ModifierAction($id,Request $request){
        $em=$this->getDoctrine()->getManager();
        $rando=$em->getRepository('HostguestBundle:Randonnees')->find($id);
        if ($request->isMethod('POST')) {
            $rando->setTitre($request->get('titre'));
            $rando->setLieu($request->get('lieu'));
            $rando->setNbmax($request->get('nbMax'));
            $rando->setLieuRencontre($request->get('lieuRencontre'));
            $rando->setPrix($request->get('prix'));
            $rando->setDescription($request->get('description'));
            $em->merge($rando);
            $em->flush();
            return $this->redirectToRoute('MesRando');
        }

    }
    public function ChercherMesRandoAction(Request $request){
        if ($request->isMethod('POST')) {
            $user = $this->get('security.token_storage')->getToken()->getUser();
            $em=$this->getDoctrine()->getManager();
            $Offres=$em->getRepository('HostguestBundle:Offres')->findOffreByUser($user);
            $randos = array();

            foreach ($Offres as $offr){
                $rando=$em->getRepository('HostguestBundle:Randonnees')->findRandoByOffreLieu($offr,$request->get('lieu'));
                // var_dump($randos);
                $randos[]=$rando;
            }

            return $this->render('HostguestBundle:Front:mesRando.html.twig',array('randos'=>$randos));
        }

    }
    public function ListAdminAction(){
        $em=$this->getDoctrine()->getManager();
        $randoAPP=$em->getRepository('HostguestBundle:Randonnees')->findBy(array('etat' =>'1' ));
        $randoNOT=$em->getRepository('HostguestBundle:Randonnees')->findBy(array('etat' =>'0' ));

        return $this->render('HostguestBundle:Back:backRando.html.twig',array('randoAPP'=>$randoAPP,'randoNOT'=>$randoNOT));
    }
    public function ApprouverAction($id){
        $em=$this->getDoctrine()->getManager();
        $rando=$em->getRepository('HostguestBundle:Randonnees')->find($id);
        $rando->setEtat(1);
        $em->merge($rando);
        $em->flush();

        return $this->redirectToRoute('ListAdmin');

    }
    public function SuuprimerAdminAction($id){
        $em=$this->getDoctrine()->getManager();
        $rando=$em->getRepository('HostguestBundle:Randonnees')->find($id);
        $offre=$em->getRepository('HostguestBundle:Offres')->find($id);
        $em->remove($rando);
        $em->flush();
        $em->remove($offre);
        $em->flush();
        return $this->redirectToRoute('ListAdmin');
    }

}

