<?php

namespace MyServiceFoodBundle\Controller;

use MyServiceFoodBundle\Entity\Article;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;

class CommandeArticleController extends FOSRestController
{

    /**
     * @Rest\Post("/article/")
     */
    public function addArticle(Request $request)
    {
        $designation=$request->get('designation');
        $prix=$request->get('prix');
        $imageUrl=$request->get('imageUrl');
        $categorie = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Categorie')->find($request->get('idCategorie'));

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
     * @Rest\Get("/commandearticles")
     */
    public function getAllCommandeArticles()
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceFoodBundle:CommandeArticle')->findAll();
        return $restresult;
    }

    /**
     * @Rest\Get("/commandearticles/{id}")
     */
    public function getCommandeByArticles($id)
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceFoodBundle:CommandeArticle')->find($id);
        return $restresult;
    }

     /**
     * @Rest\Get("/articlesbycommande/{numero}")
     */
    public function getArticlesByCommande($numero)
    {
        $commande=$this->getDoctrine()->getRepository('MyServiceFoodBundle:Commande')->find($id);
        $restresult = $this->getDoctrine()->getRepository('MyServiceFoodBundle:CommandeArticle')->findBy(array('idCommande'=>$commande));
        return $restresult;
    }

     /**
     * @Rest\Get("/articlesbystatutcommande/{statut}")
     */
    public function getArticlesByStatutCommande($statut)
    {
        $commande=$this->getDoctrine()->getRepository('MyServiceFoodBundle:Commande')->find($id);
        $restresult = $this->getDoctrine()->getRepository('MyServiceFoodBundle:CommandeArticle')->findBy(array('idCommande'=>$commande));
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

        return $restresult;
    }

    /**
     * @Rest\Delete("/articles/{id}")
     */
    public function deleteAgence($id)
    {
        $sn = $this->getDoctrine()->getManager();
        $article = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Article')->find($id);

        if (empty($article)) {
            return "nok";
        }
        else {
            $sn->remove($article);
            $sn->flush();
        }
        return "ok";
    }

}
