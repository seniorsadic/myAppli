<?php
/**
 * Created by PhpStorm.
 * User: Mame Diarra
 * Date: 15/05/2018
 * Time: 17:12
 */


namespace MyServiceFoodBundle\Controller;

use MyServiceFoodBundle\Entity\Restaurant;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;

class RestaurantController extends FOSRestController
{

    /**
     * @Rest\Get("/restaurants")
     */
    public function getAllRestaurants()
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Restaurant')->findAll();
        return $restresult;
    }
    /**
     * @Rest\Get("/restaurants/{id}")
     */
    public function getAllRestaurantId($id)
    {
        return $this->getDoctrine()->getRepository('MyServiceFoodBundle:Restaurant')->find($id);
    }


    /**
     * @Rest\Post("/restaurants")
     */
    public function addRestaurant(Request $request)
    {
        $adresse=$request->get('adresse');
        $code=$request->get('code');
        $designation=$request->get('designation');
        $email=$request->get('email');
        $telephone=$request->get('telephone');
        $imageUrl=$request->get('imageUrl');

        // Initialiser
        $restaurant=new Restaurant();
        $restaurant->setAdresse($adresse);
        $restaurant->setCode($code);
        $restaurant->setDesignation($designation);
        $restaurant->setEmail($email);
        $restaurant->setTelephone($telephone);
        $restaurant->setImageUrl($imageUrl);
        $em = $this->getDoctrine()->getManager();
        $em->persist($restaurant);
        $em->flush();
        return $restaurant;
    }

    /**
     * @Rest\Put("/restaurants/{id}")
     */
    public function updateRestaurant($id, Request $request)
    {
        $adresse=$request->get('adresse');
        $code=$request->get('code');
        $designation=$request->get('designation');
        $email=$request->get('email');
        $telephone=$request->get('telephone');
        $imageUrl=$request->get('imageUrl');

        $sn = $this->getDoctrine()->getManager();
        $restaurant = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Restaurant')->find($id);
        if(!empty($adresse)){
            $restaurant->setAdresse($adresse);
            $sn->flush();
        }
        if(!empty($code)){
            $restaurant->setCode($code);
            $sn->flush();
        }
        if(!empty($designation)){
            $restaurant->setDesignation($designation);
            $sn->flush();
        }
        if(!empty($email)){
        $restaurant->setEmail($email);
        $sn->flush();
    }
        if(!empty($telephone)){
            $restaurant->setTelephone($telephone);
            $sn->flush();
        }
        if(!empty($imageUrl)){
            $restaurant->setImageUrl($imageUrl);
            $sn->flush();
        }
        return $restaurant;

    }


    /**
     * @Rest\Delete("/restaurants/{id}")
     */
    public function deleteRestaurant($id)
    {
        $sn = $this->getDoctrine()->getManager();
        $restaurant = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Restaurant')->find($id);
        if (empty($restaurant)) {
            return FALSE;
        }
        else {
            $sn->remove($restaurant);
            $sn->flush();
        }
        return TRUE;
    }


}