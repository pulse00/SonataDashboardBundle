<?php

namespace Sonata\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SonataDashboardBundle:Default:index.html.twig', array('name' => $name));
    }
}
