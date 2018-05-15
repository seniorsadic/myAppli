<?php
/**
 * Created by PhpStorm.
 * User: Michou
 * Date: 19/11/2017
 * Time: 12:50
 */
namespace MyServiceFoodBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use MyServiceFoodBundle\Entity\Cuisine;

class CuisineController extends FOSRestController
{
    /**
     * @Rest\Post("/cuisines")
     */
    public function addCuisine(Request $request)
    {
        $nom=$request->get('nom');
        $type=$request->get('type');
        $imageUrl=$request->get('imageUrl');
        $restaurant = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Restaurant')->find($request->get('idResto'));
        $cuisine=new Cuisine();
        $cuisine->setNom($nom);
        $cuisine->setType($type);
        $cuisine->setImageUrl($imageUrl);
        $cuisine->setIdResto($restaurant);
        $em = $this->getDoctrine()->getManager();
        $em->persist($cuisine);
        $em->flush();
        return $cuisine;
    }

    /**
     * @Rest\Get("/cuisines")
     */
    public function getAllCuisine()
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Cuisine')->findAll();
        return $restresult;
    }

    /**
     * @Rest\Get("/cuisines/{id}")
     */
    public function getCuisineById($id)
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Cuisine')->find($id);
        return $restresult;
    }

    /**
     * @Rest\Put("/cuisines/{id}")
     */
    public function udpdateCuisine($id,Request $request)
    {
        $sn = $this->getDoctrine()->getManager();
        $nom=$request->get('nom');
        $type=$request->get('type');
        $imageUrl=$request->get('imageUrl');
        $idResto=$request->get('idResto');
        $cuisine = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Cuisine')->find($id);
       
        if(!empty($nom)){
            $cuisine->setNom($nom);
            $sn->flush();
        }

        if(!empty($type)){
            $cuisine->setType($type);
            $sn->flush();
        }

        if(!empty($imageUrl)){
            $cuisine->setImageUrl($imageUrl);
            $sn->flush();
        }

        if(!empty($idResto)){
            $restaurant = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Restaurant')->find($idResto);
            $cuisine->setIdResto($restaurant);
            $sn->flush();
        }

        return $cuisine;
    }

    
    /**
     *@Rest\Delete("/cuisines/{id}")
     */
    public function deleteCuisine($idCuisine)
    {
        $sn = $this->getDoctrine()->getManager();
        $cuisine = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Cuisine')->find($idCuisine);

        if (empty($cuisine)) {
            return TRUE;
        }
        else {
            $sn->remove($cuisine);
            $sn->flush();
        }
        return FALSE;
    }
}
