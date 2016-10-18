<?php

namespace fctBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('fctBundle:Default:index.html.twig');
    }
}
