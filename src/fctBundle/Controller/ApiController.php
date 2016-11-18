<?php
namespace fctBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use fctBundle\Entity\Empresa;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiController extends Controller
{
private function serializeEmpresa(Empresa $empresa)
   {
     return array(
         'id' => $empresa->getId(),
         'nombre' => $empresa->getNombre(),
         'direccion' => $empresa->getDireccion(),
         'cp' => $empresa->getCp(),
         'telefono1' => $empresa->getTelefono1(),
         'telefono2' => $empresa->getTelefono2(),
     );
   }
   public function empresasAction()
   {
       $repository = $this->getDoctrine()->getRepository('fctBundle:Empresa');
       $empresas = $repository->findAll();


       //var_dump($empresas);
       $data = array('empresas' => array());
       foreach ($empresas as $empresa) {
           $data['empresas'][] = $this->serializeEmpresa($empresa);
       }
       $response = new JsonResponse($data, 400);
       return $response;
       //return $this->json($empresas);*/
   }
}
?>
