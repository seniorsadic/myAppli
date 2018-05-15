<?php

namespace MyServiceFoodBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

class CatalogueController extends FOSRestController
{
    // Méthode d'ajout d'un catalogue
    /**
     * @Rest\Post("/catalogues/")
     */
    public function addCatalogue(Request $request)
    {
        $nom=$request->get('nom');        
		$idresto=$request->get('idresto');
        $restaurant = $this->getDoctrine()->getRepository('MyServiceBundle:Restaurant')->find($idresto);
        $catalogue=new Catalogue();
        $catalogue->setNom($nom);
		$catalogue->setIdresto($restaurant);
        //$catalogue->setImageurl($imageUrl);
        $em = $this->getDoctrine()->getManager();
        $em->persist($catalogue);
        $em->flush();
        return $catalogue;
    }

    //methode get pour recuperer toutes les catalogues
    /**
     * @Rest\Get("/catalogues")
     */
    public function getAllCatalogue()
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Catalogue')->findAll();
        return $restresult;
    }

    //methode get pour recuperer une seule catalogue
    /**
     * @Rest\Get("/catalogues/{id}")
     */
    
    public function getCatalogueById($idcatalogue)
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Catalogue')->find($idcatalogue);
        return $restresult;
    }

    //methode put pour mettre à jour un catalogue
    /**
     * @Rest\Put("/catalogues/{id}")
     */

    public function udpdateCatalogue($idcatalogue,Request $request)
    {
        $nom=$request->get('nom');
		$idresto=$request->get('idresto');
        $sn = $this->getDoctrine()->getManager();
        $catalogue= $this->getDoctrine()->getRepository('MyServiceBundle:Catalogue')->find($idcatalogue);

        if(!empty($nom)){
            $catalogue->setNom($nom);
            $sn->flush();
        }
		if(!empty($idresto)){
            $restaurant = $this->getDoctrine()->getRepository('MyServiceBundle:Restaurant')->find($idresto);
            $catalogue->setIdresto($restaurant);
            $sn->flush();
        }

        return $catalogue;

    }

    // methode delete pour la supression d'un catalogue
    /**
     *@Rest\Delete("/catalogues/{id}")
     */
    public function deleteCatalogue($idcatalogue)
    {
        $sn = $this->getDoctrine()->getManager();
        $catalogue = $this->getDoctrine()->getRepository('MyServiceBundle:Catalogue')->find($idcatalogue);

        if (empty($catalogue)) {
            return new View("Catalogue not found", Response::HTTP_NOT_FOUND);
        }
        else {
            $sn->remove($catalogue);
            $sn->flush();
        }
        return new View("Catalogue deleted successfully", Response::HTTP_OK);
    }
}