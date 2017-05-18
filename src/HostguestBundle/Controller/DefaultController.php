<?php

namespace HostguestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('HostguestBundle:Trip:Hometrip.html.twig');
    }
    public function detailIndexAction()
    {
        return $this->render('HostguestBundle:Trip:Tripdetail.html.twig');
    }
}
