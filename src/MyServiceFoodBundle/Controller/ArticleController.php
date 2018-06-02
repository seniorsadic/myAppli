<?php

namespace MyServiceFoodBundle\Controller;

use MyServiceFoodBundle\Entity\Article;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends FOSRestController
{

    /**
     * @Rest\Post("/articles")
     */
    public function addArticle(Request $request)
    {
        $designation=$request->get('designation');
        $prix=$request->get('prix');
        $imageUrl=$request->get('imageUrl');
        $categorie = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Categorie')->find($request->get('id_categorie'));

        // Initialiser
        $article=new Article();
        $article->setDesignation($designation);
        $article->setPrix($prix);
        $article->setImageUrl($imageUrl);
        $article->setIdCategorie($categorie);
        $em = $this->getDoctrine()->getManager();
        $em->persist($article);
        $em->flush();
        return $article;
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
     * @Rest\Get("/articlesbycategorie/{id}")
     */
    public function getArticleByCategorie($id)
    {
        $categorie= $this->getDoctrine()->getRepository('MyServiceFoodBundle:Categorie')->find($id);
        $restresult = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Article')->findBy(array('idCategorie'=>$categorie));
        return $restresult;
    }

     /**
     * @Rest\Get("/articles/{id}")
     */
    public function getAgenceById($id)
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Article')->find($id);
        return $restresult;
    }

    /**
     * @Rest\Put("/articles/{id}")
     */
    public function updateAgence($id, Request $request)
    {
        $designation=$request->get('designation');
        $prix=$request->get('prix');
        $imageUrl=$request->get('imageUrl');
        $idCategorie=$request->get('idCategorie'); 
        $sn = $this->getDoctrine()->getManager();
        $article = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Article')->find($id);

        if(!empty($prix)){
            $article->setPrix($prix);
            $sn->flush();
        }

        if(!empty($designation)){
            $article->setDesignation($designation);
            $sn->flush();
        }

        if(!empty($imageUrl)){
            $article->setImageUrl($imageUrl);
            $sn->flush();
        }

        if(!empty($idCategorie)){
            $categorie = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Categorie')->find($idCategorie);
          //  $ville = $this->getDoctrine()->getRepository('MyServiceBundle:Ville')->find($idville);
            $agence->setCategorie($categorie);
            $sn->flush();
        }

        return $article;
    }

    /**
     * @Rest\Delete("/articles/{id}")
     */
    public function deleteAgence($id)
    {
        $sn = $this->getDoctrine()->getManager();
        $article = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Article')->find($id);

        if (empty($article)) {
            return FALSE;
        }
        else {
            $sn->remove($article);
            $sn->flush();
        }
        return TRUE;
    }

}
