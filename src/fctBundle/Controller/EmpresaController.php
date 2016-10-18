<?php

namespace fctBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EmpresaController extends Controller
{
    public function allAction()
    {
        $repository = $this->getDoctrine()->getRepository('fctBundle:Empresa');

        $empresas = $repository->findAll();
        return $this->render('fctBundle:Empresa:all.html.twig', array("empresas"=>$empresas));
    }
}
