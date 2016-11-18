<?php

namespace fctBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use fctBundle\Entity\Alumno;
use Symfony\Component\HttpFoundation\Request;
use fctBundle\Form\AlumnoType;

class AlumnoController extends Controller
{
    public function AllAction()
    {
        $repository = $this->getDoctrine()->getRepository('fctBundle:Alumno');

        $alumnos = $repository->findAll();
        return $this->render('fctBundle:Alumno:all.html.twig', array("alumnos"=>$alumnos));
    }
}
