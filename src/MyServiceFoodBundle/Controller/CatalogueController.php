<?php

namespace MyServiceFoodBundle\Controller;

use MyServiceFoodBundle\Entity\Catalogue;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;

class CatalogueController extends FOSRestController
{

    // Méthode d'ajout d'un catalogue
    /**
     * @Rest\Post("/catalogues")
     */
    public function addCatalogue(Request $request)
    {
        $nom=$request->get('nom');
        $imageUrl=$request->get('imageUrl');
        $resto = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Restaurant')->find($request->get('idResto'));
        $catalogue=new Catalogue();
        $catalogue->setNom($nom);
        $catalogue->setImageurl($imageUrl);
        $catalogue->setIdResto($resto);
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
    
    public function getCatalogueById($id)
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Catalogue')->find($id);
        return $restresult;
    }

    //methode put pour mettre à jour un catalogue
    /**
     * @Rest\Put("/catalogues/{id}")
     */

    public function udpdateCatalogue($id,Request $request)
    {
        $nom=$request->get('nom');
        $imageUrl=$request->get('imageUrl');
        $idResto=$request->get('idResto');
        $sn = $this->getDoctrine()->getManager();
        $catalogue= $this->getDoctrine()->getRepository('MyServiceFoodBundle:Catalogue')->find($id);

        if(!empty($nom)){
            $catalogue->setNom($nom);
            $sn->flush();
        }
        if(!empty($imageUrl)){
            $catalogue->setImageUrl($imageUrl);
            $sn->flush();
        }
        if(!empty($idResto)){
            $resto = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Restaurant')->find($idResto);
            $catalogue->setIdResto($resto);
            $sn->flush();
        }

        return $catalogue;

    }

    // methode delete pour la supression d'un catalogue
    /**
     *@Rest\Delete("/catalogues/{id}")
     */
    public function deleteCatalogue($id)
    {
        $sn = $this->getDoctrine()->getManager();
        $catalogue = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Catalogue')->find($id);

        if (empty($catalogue)) {
            return FALSE;
        }
        else {
            $sn->remove($catalogue);
            $sn->flush();
        }
        return TRUE;
    }

}
