<?php

namespace fctBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use fctBundle\Entity\Conf;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use fctBundle\Form\ConfType;
use Symfony\Component\HttpFoundation\Response;

class ConfController extends Controller
{
    /**
    * @Security("has_role('ROLE_SUPER_ADMIN')")
    */
    public function confAction()
    {
        $repository = $this->getDoctrine()->getRepository('fctBundle:Conf');

        $config = $repository->findAll();
        return $this->render('fctBundle:Conf:all.html.twig', array("config"=>$config));
    }
    /**
    * @Security("has_role('ROLE_SUPER_ADMIN')")
    */
    public function nuevoAction(Request $request){
      $config =new Conf();
      $form= $this->createForm(ConfType::class,$config);

      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
           // $form->getData() holds the submitted values
           // but, the original `$task` variable has also been updated
           $config = $form->getData();

           // ... perform some action, such as saving the task to the database
           // for example, if Task is a Doctrine entity, save it!
           $em = $this->getDoctrine()->getManager();
           $em->persist($config);
           $em->flush();

           return new Response("Conf Insertada");
        }


      return $this->render('fctBundle:Conf:nuevo.html.twig', array("form"=>$form->createView()));
    }
}
