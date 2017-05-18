<?php

namespace HostguestBundle\Controller;

use HostguestBundle\Entity\Evaluations;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Ob\HighchartsBundle\Highcharts\Highchart;



/**
 * Evaluation controller.
 *
 */
class EvaluationsController extends Controller
{
    /**
     * Lists all evaluation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $evaluations = $em->getRepository('HostguestBundle:Evaluations')->findAll();

        return $this->render('evaluations/index.html.twig', array(
            'evaluations' => $evaluations,
        ));
    }

    public function newAction(Request $request,$id)
    {
        $eval = new Evaluations();
        $form = $this->createForm('HostguestBundle\Form\EvaluationType', $eval);
        $form->handleRequest($request);
        $user = $this->getUser();
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $eval->setIdVoyageur($user->getId());
            $idd=(integer)$id;

            $eval->setIdOffre($idd);
            $note=($eval->getFacility()+$eval->getService()+$eval->getInteresting()+$eval->getHuman())/4;
            $eval->setNote($note);
            $em->persist($eval);
            $em->flush($eval);


            return $this->redirectToRoute('evaluations_connecte');
        }

        return $this->render('evaluations/new.html.twig', array(
            'eval' => $eval,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a evaluation entity.
     *
     */
    public function showAction(Evaluations $evaluation)
    {

        return $this->render('evaluations/show.html.twig', array(
            'evaluation' => $evaluation,
        ));
    }
    public function myEvalAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $evaluations = $em->getRepository('HostguestBundle:Evaluations')->findBy(array('idVoyageur'=> $user));

        return $this->render('evaluations/myEval.html.twig', array(
            'evaluations' => $evaluations,
        ));
    }
    public function editAction(Request $request,$id)
    {

        $eval = $this->getDoctrine()->getRepository('HostguestBundle:Evaluations')->find($id);
        $editForm = $this->createForm('HostguestBundle\Form\EvaluationType', $eval);
        $editForm->handleRequest($request);
        $editForm->getData();


        if ($editForm->isValid()) {

            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('hostguest_profile');
        }
        return $this->render('evaluations/edit.html.twig', array(
            'evaluations' => $eval,
            'edit_form' => $editForm->createView(),
        ));

    }


    public function deleteAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $eval=$em->getRepository('HostguestBundle:Evaluations')->find($id);
        $em->remove($eval);
        $em->flush();
        return $this->redirectToRoute('evaluations_index');
    }


    public function chartLineAction()
    {
        $em = $this->container->get('doctrine')->getEntityManager();
        $classes = $em->getRepository(Evaluations::class)->findAll();
        $tab = array();
        $categories = array();
        foreach ($classes as $classe) {
            array_push($tab, $classe->getNote());
            array_push($categories, $classe->getTitre());

        }
        $series = array( array("name" => "Notes :", "data" => $tab) );
        $ob = new Highchart();
        $ob->chart->renderTo('linechart');
        // // #id du div où afficher le graphe
        $ob->title->text('Variation des notes');
        $ob->xAxis->title(array('text' => "titre des evaluations"));
        $ob->yAxis->title(array('text' => "notes"));
        $ob->xAxis->categories($categories);
        $ob->series($series);
        return $this->render('HostguestBundle:BackEnd:LineChart.html.twig', array(
            'chart' => $ob ));
    }

    public function chartPieAction(){
        $ob = new Highchart();
        $ob->chart->renderTo('piechart');
        $ob->title->text('Notes');
        $ob->plotOptions->pie(array
        ( 'allowPointSelect' => true, 'cursor' => 'pointer', 'dataLabels' => array('enabled' => false), 'showInLegend' => true ));
        $em= $this->container->get('doctrine')->getEntityManager();
        $classes = $em->getRepository(Evaluations::class)->findAll();
        $totalEtudiant=0;
        foreach($classes as $classe) { $totalEtudiant=$totalEtudiant+$classe->getNote(); }
        $data= array();
        foreach($classes as $classe) { $stat=array(); array_push($stat,$classe->getTitre(),(($classe->getNote()) *100)/$totalEtudiant);
            var_dump($stat); array_push($data,$stat);
        } var_dump($data);
        $ob->series(array(array('type' => 'pie','name' => 'Browser share', 'data' => $data)));
        return $this->render('HostguestBundle:BackEnd:ChartPie.html.twig', array( 'chart' => $ob )); }

}
