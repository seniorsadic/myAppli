<?php

namespace MyServiceFoodBundle\Controller;

use MyServiceFoodBundle\Entity\CommandeArticleTemporaire;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;

class CommandeArticleTemporaireController extends FOSRestController
{
    /**
     * @Rest\Get("/temporaires")
     */
    public function gettemporaires()
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceFoodBundle:CommandeArticleTemporaire')->findAll();
        return $restresult;
    }

    /**
     * @Rest\Get("/temporaires/{id}")
     */
    public function gettemporairesById($id)
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceFoodBundle:CommandeArticleTemporaire')->find($id);
        return $restresult;
    }

    /**
     * @Rest\Post("/articlestemporaires")
     */
    public function getarticlestemporaires(Request $request)
    {
        $employe= $this->getDoctrine()->getRepository('MyServiceFoodBundle:Employe')->find($request->get('id_employe'));
        $restresult = $this->getDoctrine()->getRepository('MyServiceFoodBundle:CommandeArticleTemporaire')->findBy(array('idEmploye'=>$employe));
        return $restresult;
    }

    /**
     * @Rest\Post("/temporaires")
     */
    public function addtemporaires(Request $request)
    {
      
      //  $compte=$this->getDoctrine()->getRepository('MyServiceFoodBundle:Compte')->find($request->get('id_compte'));
        $employe=$this->getDoctrine()->getRepository('MyServiceFoodBundle:Employe')->find($request->get('id_employe'));
      //  $table=$this->getDoctrine()->getRepository('MyServiceFoodBundle:Tables')->find($request->get('id_table'));
        $article=$this->getDoctrine()->getRepository('MyServiceFoodBundle:Article')->find($request->get('id_article'));
        $commandearticletemporaire=new CommandeArticleTemporaire();
        $commandearticletemporaire->setDate(new \DateTime());
        $commandearticletemporaire->setIdEmploye($employe);
     //   $commandearticletemporaire->setIdCompte($compte);
      //  $commandearticletemporaire->setIdTable($table);
        
        $commandearticletemporaire->setIdArticle($article);
        $em = $this->getDoctrine()->getManager();
        $em->persist($commandearticletemporaire);
        $em->flush();
        return $commandearticletemporaire;
    }

    /**
     * @Rest\Post("/temporaires/{id}")
     */
    public function updatetemporaires(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $commandearticletemporaire=$this->getDoctrine()->getRepository('MyServiceFoodBundle:CommandeArticleTemporaire')->find($id);
        $compte=$this->getDoctrine()->getRepository('MyServiceFoodBundle:Compte')->find($request->get('idCompte'));
        $employe=$this->getDoctrine()->getRepository('MyServiceFoodBundle:Employe')->find($request->get('idEmploye'));
        $table=$this->getDoctrine()->getRepository('MyServiceFoodBundle:Tables')->find($request->get('idTable'));
        $article=$this->getDoctrine()->getRepository('MyServiceFoodBundle:Article')->find($request->get('idArticle'));
        
        
        if(!empty($compte)){
            $commandearticletemporaire->setIdCompte($compte);
        }
        if(!empty($employe)){
            $commandearticletemporaire->setIdEmploye($employe);
        }
        if(!empty($table)){
            $commandearticletemporaire->setIdTable($table);
        }
        if(!empty($article)){
            $commandearticletemporaire->setIdArticle($article);
        }
        $em->flush();
        return $commandearticletemporaire;
    }

    /**
     * @Rest\Delete("/temporaires/{id}")
     */
    public function deletetemporaires($id)
    {
        $em = $this->getDoctrine()->getManager();
        $commandearticletemporaire = $this->getDoctrine()->getRepository('MyServiceFoodBundle:CommandeArticleTemporaire')->find($id);

        if (!$commandearticletemporaire) {
            return FALSE;
        }
        else{
            $em->remove($commandearticletemporaire);
            $em->flush();
            return TRUE;
        }
    }
}