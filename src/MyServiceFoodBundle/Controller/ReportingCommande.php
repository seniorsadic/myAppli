<?php

namespace MyServiceFoodBundle\Controller;

use MyServiceFoodBundle\Entity\Article;
use MyServiceFoodBundle\Entity\Commande_article;
use MyServiceFoodBundle\Entity\Commande;
use MyServiceFoodBundle\Entity\Categorie;
use MyServiceFoodBundle\Entity\Employe;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;

class ReportingCommande extends FOSRestController
{

    /**
     * @Rest\Get("/reportcommande/")
     */
    public function getReportCommande()
    {
        $em=$this->getDoctrine()->getRepository('MyServiceFoodBundle:Commande_article');
        $query=$em->createQueryBuilder('ca')
            ->join('ca.id_commannde','c')
            ->join('ca.id_article','a')
            ->join('a.id_categorie','ct')
            ->join('c.id_serveur','e')
            ->addSelect('ca')
            ->addSelect('c')
            ->addSelect('a')
            ->addSelect('ct')
            ->addSelect('e')
            ->groupBy('c.numero, a.designation,ca.quantite,ca.prix_unitaire, ca.prix_total,c.date,e.nom,e.prenom')
            ->select('c.numero, a.designation,ca.quantite,ca.prix_unitaire, ca.prix_total,c.date,e.nom,e.prenom, sum(ca.prix_total), count(0)')
            ->getQuery();
        $restresult=$query->getResult();

        return $restresult;


    }
}