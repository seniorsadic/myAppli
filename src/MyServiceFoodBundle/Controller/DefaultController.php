<?php

namespace MyServiceFoodBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

class DefaultController extends FOSRestController
{
    /**
     * @Rest\Get("/articles")
     */
    public function getAllArticle()
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Article')->findAll();
        return $restresult;
    }
}
