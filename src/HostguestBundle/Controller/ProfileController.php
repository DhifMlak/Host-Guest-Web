<?php
/**
 * Created by PhpStorm.
 * User: Joey Badass
 * Date: 08/04/2017
 * Time: 18:40
 */

namespace HostguestBundle\Controller;

use HostguestBundle\Entity\Sorties;
use HostguestBundle\HostguestBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ProfileController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $offres = $em->getRepository('HostguestBundle:Offres')->myOffers($user->getId());
        //$sorties = $em->getRepository('HostguestBundle:Sorties')->findBy(array('id'=>$offres));
        $ids = array();
        foreach ($offres  as $offre){
            array_push($ids,$offre['id']);
        }
        $sorties = $em->getRepository('HostguestBundle:Sorties')->findBy(array('id'=> $ids));
        return $this->render('@Hostguest/profileuser/profile.html.twig',array('sorties'=>$sorties));
    }
    public function editAction($id)
    {
        $sorty = $this->getDoctrine()->getRepository('HostguestBundle:Sorties')->find($id);
        $editForm = $this->createForm('HostguestBundle\Form\SortiesType', $sorty);
        return $this->render('@Hostguest/profileuser/edit.html.twig', array(
            'edit_form' => $editForm->createView(),
            'id'=>$id
        ));

    }
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $sortie = $em->getRepository('HostguestBundle:Sorties')->find($id);
        $offre = $em->getRepository('HostguestBundle:Offres')->find($id);
        $em->remove($offre);


        $em->remove($sortie);
        $em->flush($sortie);
        return $this->redirectToRoute('hostguest_profile');
    }
}