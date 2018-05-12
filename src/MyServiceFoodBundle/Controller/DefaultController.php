<?php

namespace MyServiceFoodBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends FOSRestController
{
    /**
     * @Rest\Get("/art")
     */
    public function getAllArticle()
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Article')->findAll();
        return $restresult;
    }
}
