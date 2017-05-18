<?php

namespace HostguestBundle\Controller;

use HostguestBundle\Form\BanForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerInterface;

class AdminController extends Controller
{
    public function indexAction()
    {
        //$sorties = $this->getDoctrine()->getManager()->getRepository('HostguestBundle:Sorties')->findAll();
        $evaluations = $this->getDoctrine()->getManager()->getRepository('HostguestBundle:Evaluations')->findAll();
        //var_dump($evaluations);
        $sorties = array();
        foreach ($evaluations as $ev){
            $sorties=$this->getDoctrine()->getManager()->getRepository('HostguestBundle:Sorties')->findBy(array('id' =>$ev->getIdOffre() ));
        }




        return $this->render('HostguestBundle:BackEnd:adminManage.html.twig',array('eva'=>$evaluations,'sor'=>$sorties));
    }
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        //$sortie = $em->getRepository('HostguestBundle:Sorties')->find($id);
        //$offre = $em->getRepository('HostguestBundle:Offres')->find($id);
        $evaluation = $em->getRepository('HostguestBundle:Evaluations')->find($id);
        $em->remove($evaluation);
        //$em->remove($offre);
        $em->flush();
        return $this->redirectToRoute('hostguest_admin_index');
    }
    public function BannerClientAction(Request $req, $id)
    {
        $d=$this->getDoctrine()->getEntityManager();
        $qb=$this->getDoctrine()->getEntityManager()->createQueryBuilder();

        $user=$this->getDoctrine()->getEntityManager()->getRepository('HostguestBundle:Utilisateurs')->find($id);
        $form_ban=$this->createForm(BanForm::class,$user);
        $form_ban->handleRequest($req);

        if($form_ban->isSubmitted())
        {
            $d->persist($user);
            $d->flush();
            $q=$qb->update('HostguestBundle:Utilisateurs','c')
                ->set('c.enabled' ,'?1')
                ->where('c.id= ?2')
                ->setParameter(1,0)
                ->setParameter(2,$id)
                ->getQuery();
            $q->execute();
            return $this->redirectToRoute("hostguest_admin_index");

        }
        return $this->render('HostguestBundle:BackEnd:BanClient.html.twig',array("BanForm"=>$form_ban->createView(),"user"=>$user));
    }
}
