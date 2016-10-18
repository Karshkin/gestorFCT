<?php

namespace landingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('landingBundle:Default:index.html.twig');
    }

    public function imperioAction()
    {
        return $this->render('landingBundle:Default:imperio.html.twig');
    }

    public function rebelionAction()
    {
        return $this->render('landingBundle:Default:rebelion.html.twig');
    }
}
