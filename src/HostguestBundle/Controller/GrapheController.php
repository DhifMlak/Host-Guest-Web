<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ob\HighchartsBundle\Highcharts\Highchart;

use UserBundle\Entity\Event;

class GrapheController extends Controller
{
    public function chartLineAction()
    {
        $em = $this->container->get('doctrine')->getEntityManager();
        $classes = $em->getRepository('UserBundle:Event')->findAll();
        $tab = array();
        $categories = array();
        foreach ($classes as $classe) {
            array_push($tab, $classe->getNbrparticipants());
            array_push($categories, $classe->getNom());

        }
        $series = array( array("name" => "Nb étudiants", "data" => $tab) );
        $ob = new Highchart();
        $ob->chart->renderTo('linechart');
        // // #id du div où afficher le graphe
        $ob->title->text('Nombre de participants pas Evenement');
         $ob->xAxis->title(array('text' => "Evenement"));
        $ob->yAxis->title(array('text' => "Nb participants"));
        $ob->xAxis->categories($categories);
        $ob->series($series);
         return $this->render('UserBundle:Graphe:LineChart.html.twig', array( 'chart' => $ob ));
    }
    public function chartPieAction(){
        $ob = new Highchart();
        $ob->chart->renderTo('piechart');
        $ob->title->text('Pourcentages des étudiants par niveau');
        $ob->plotOptions->pie(array
        ( 'allowPointSelect' => true, 'cursor' => 'pointer', 'dataLabels' => array('enabled' => false), 'showInLegend' => true ));
        $em= $this->container->get('doctrine')->getEntityManager();
        $classes = $em->getRepository('UserBundle:Event')->findAll();
        $totalEtudiant=0;
        foreach($classes as $classe) { $totalEtudiant=$totalEtudiant+$classe->getNbrparticipants(); }
        $data= array();
        foreach($classes as $classe) { $stat=array(); array_push($stat,$classe->getNom(),(($classe->getNbrparticipants()) *100)/$totalEtudiant);
            var_dump($stat); array_push($data,$stat);
        } var_dump($data);
        $ob->series(array(array('type' => 'pie','name' => 'Browser share', 'data' => $data)));
        return $this->render('UserBundle:Graphe:ChartPie.html.twig', array( 'chart' => $ob )); }

}