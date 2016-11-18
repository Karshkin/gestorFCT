<?php

namespace fctBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use fctBundle\Entity\Empresa;
use Symfony\Component\HttpFoundation\Request;
use fctBundle\Form\EmpresaType;

class EmpresaController extends Controller
{
    public function allAction()
    {
        $repository = $this->getDoctrine()->getRepository('fctBundle:Empresa');

        $empresas = $repository->findAll();
        return $this->render('fctBundle:Empresa:all.html.twig', array("empresas"=>$empresas));
    }
    public function crearEmpresaAction()
    {

        $empresa =new Empresa();
        $empresa->setNombre("empresa 2");
        $empresa->setDireccion("Calle verdadera 13");
        $empresa->setCp(31237);
        $empresa->setTelefono1(938442843);
        $empresa->setTelefono2(234456785);
        $empresa->setFecha("02/12/2015");

        $mangDoct=$this->getDoctrine()->getManager();
        $mangDoct->persist($empresa);
        $mangDoct->flush();
        return $this->render('fctBundle:Empresa:crearEmpresa.html.twig', array("empresaId"=>$empresa->getId()));
    }
    public function buscarEmpresaAction($id)
  {
    //REcuperar el repositorio de la entidad Empresa
    $repository = $this->getDoctrine()->getRepository('fctBundle:Empresa');
    $empresa = $repository->findOneById($id);

    return $this->render('fctBundle:Empresa:empresa.html.twig',array("id"=>$empresa->getId(),"nombre"=>$empresa->getNombre()));
  }
    public function buscarEmpresaPorNombreAction($nombre)
  {
    //REcuperar el repositorio de la entidad Empresa
    $repository = $this->getDoctrine()->getRepository('fctBundle:Empresa');
    $empresa = $repository->findOneByNombre($nombre);

    return $this->render('fctBundle:Empresa:empresa.html.twig',array("id"=>$empresa->getId(),"nombre"=>$empresa->getNombre()));
  }

    public function nuevoAction(Request $request){
      $empresa =new Empresa();
      $form= $this->createForm(EmpresaType::class,$empresa);

      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
           // $form->getData() holds the submitted values
           // but, the original `$task` variable has also been updated
           $empresa = $form->getData();

           // ... perform some action, such as saving the task to the database
           // for example, if Task is a Doctrine entity, save it!
           $em = $this->getDoctrine()->getManager();
           $em->persist($empresa);
           $em->flush();

           return $this->redirectToRoute('exito_empresa');
        }


      return $this->render('fctBundle:Empresa:nuevo.html.twig', array("form"=>$form->createView()));
    }
    public function msgExitoAction()
    {
        $repository = $this->getDoctrine()->getRepository('fctBundle:Empresa');

        $empresas = $repository->findAll();
        return $this->render('fctBundle:Empresa:all.html.twig', array("empresas"=>$empresas));
    }
}
