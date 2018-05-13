<?php

namespace MyServiceFoodBundle\Controller;

use MyServiceFoodBundle\Entity\Article;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;

class CommandeArticleController extends FOSRestController
{

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
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT ca
                FROM MyServiceFoodBundle:CommandeArticle ca, 
                MyServiceFoodBundle:Commande c
                WHERE c.idCommande=ca.idCommande and c.statut = :x '
        )->setParameter('x', $statut);

        return $query->getResult();
    }

     /**
     * @Rest\Get("/articlesbystatutandstatutcommande/{statut}/{statutcommande}")
     */
    public function getarticlesbystatutandstatutcommande($statut,$statutcommande)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT ca
                FROM MyServiceFoodBundle:CommandeArticle ca, 
                MyServiceFoodBundle:Commande c
                WHERE c.idCommande=ca.idCommande and c.statut = :x and ca.statut= :y'
        )->setParameter('x', $statutcommande)
        ->setParameter('y', $statut);

        return $query->getResult();
    }

     /**
     * @Rest\Get("/serveurCommandesDuJour/{serveur}")
     */
    public function getserveurCommandesDuJour($serveur)
    {
        $em = $this->getDoctrine()->getManager();
        $c=date_format(new \DateTime(),'d-m-Y');
        $compte=$this->getDoctrine()->getRepository('MyServiceFoodBundle:Compte')->findOneBy(array('login'=>$serveur));
        $query = $em->createQuery(
            'SELECT ca
                FROM MyServiceFoodBundle:CommandeArticle ca, 
                MyServiceFoodBundle:Commande c
                WHERE c.idCommande=ca.idCommande  and c.date like :x and c.idServeur= :y'
        )->setParameter('x', $c.'%')
        ->setParameter('y', $compte->getIdEmploye());

        return $query->getResult();
    }

    /**
     * @Rest\Get("/cuisinierCommandesDuJour/{cuisinier}")
     */
    public function getcuisinierCommandesDuJour($cuisinier)
    {
        $em = $this->getDoctrine()->getManager();
        $c=date_format(new \DateTime(),'d-m-Y');
        $compte=$this->getDoctrine()->getRepository('MyServiceFoodBundle:Compte')->findOneBy(array('login'=>$cuisinier));

        $query = $em->createQuery(
            'SELECT ca
                FROM MyServiceFoodBundle:CommandeArticle ca, 
                MyServiceFoodBundle:Commande c
                WHERE c.idCommande=ca.idCommande  and c.date like :x and ca.idCuisinier= :y'
        )->setParameter('x', $c.'%')
        ->setParameter('y', $compte->getIdEmploye());

        return $query->getResult();
    }

    /**
     * @Rest\Post("/commandearticlesbycuisinier")
     */
    public function getcommandearticlesbycuisinier(Request $request)
    {
        $cuisinier=$request->get('idCuisinier');
        $em = $this->getDoctrine()->getManager();
        $compte=$this->getDoctrine()->getRepository('MyServiceFoodBundle:Compte')->findOneBy(array('login'=>$cuisinier));

        $query = $em->createQuery(
            'SELECT ca
                FROM MyServiceFoodBundle:CommandeArticle ca, 
                MyServiceFoodBundle:Commande c
                WHERE c.idCommande=ca.idCommande  and ca.idCuisinier= :y'
        ) ->setParameter('y', $cuisinier);

        return $query->getResult();
    }

    /**
     * @Rest\Put("/commandearticles/{id}")
     */
    public function updateCommandearticles(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $commandearticle = $this->getDoctrine()->getRepository('MyServiceFoodBundle:CommandeArticle')->find($id);

        $prixTotal=$request->get('prixTotal');
        $prixUnitaire=$request->get('prixUnitaire');
        $quantite=$request->get('quantite');
        $statut=$request->get('statut');
        $idArticle=$request->get('idArticle');
        $idCuisinier=$request->get('idCuisinier');
        $idCommande=$request->get('idCommande');
        if(!empty($prixTotal)){
            $commandearticle->setPrixTotal($prixTotal);
        } 
        if(!empty($prixUnitaire)){
            $commandearticle->setPrixUnitaire($prixUnitaire);
        }
        if(!empty($quantite)){
            $commandearticle->setQuantite($quantite);
        }
        if(!empty($statut)){
            $commandearticle->setStatut($statut);
        }
        if(!empty($idArticle)){
            $article=$this->getDoctrine()->getRepository('MyServiceFoodBundle:Article')->find($idArticle);
            $commandearticle->setIdArticle($article);
        }
        if(!empty($idCuisinier)){
            $cuisinier=$this->getDoctrine()->getRepository('MyServiceFoodBundle:Cuisinier')->find($idCuisinier);
            $commandearticle->setIdCuisinier($cuisinier);
        }
        if(!empty($idCommande)){
            $commande=$this->getDoctrine()->getRepository('MyServiceFoodBundle:Commande')->find($idCommande);
            $commandearticle->setIdCommande($commande);
        }
        $em->flush();
        return $commandearticle;
    }

    /**
     * @Rest\Delete("/commandearticles/{id}")
     */
    public function commandearticles($id)
    {
        $em = $this->getDoctrine()->getManager();
        $commandearticle = $this->getDoctrine()->getRepository('MyServiceFoodBundle:CommandeArticle')->find($id);

        if (!$commandearticle) {
            return 'nok';
        }
        else{
            $em->remove($commandearticle);
            $em->flush();
            return 'ok';
        }
    }

}
