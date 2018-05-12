<?php

namespace MyServiceFoodBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

class CatalogueController extends FOSRestController
{

    /**
     * @Rest\Post("/article/")
     */
    public function getAddArticle()
    {
        $designation=$request->get('designation');
        $idville=$request->get('idville');
        $ville = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Article')->find($idville);
        $agence=new Agence();
        $agence->setDesignation($designation);
        $agence->setIdville($ville);
        $em = $this->getDoctrine()->getManager();
        $em->persist($agence);
        $em->flush();
        return $agence;

        $restresult = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Article')->findAll();
        return $restresult;
    }

    /**
     * @Rest\Get("/articles")
     */
    public function getAllArticle()
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Article')->findAll();
        return $restresult;
    }

     /**
     * @Rest\Get("/article/{idarticle}")
     */
    public function getAgenceById($idarticle)
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Article')->find($idarticle);
        return $restresult;
    }

}
