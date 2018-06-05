<?php

namespace MyServiceFoodBundle\Controller;

use MyServiceFoodBundle\Entity\Article;
use MyServiceFoodBundle\Entity\CommandeArticle;
use MyServiceFoodBundle\Entity\Commande;
use MyServiceFoodBundle\Entity\Categorie;
use MyServiceFoodBundle\Entity\Employe;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;

class ReportingCommande extends FOSRestController
{

    /**
     * @Rest\Get("/reportcommande")
     */
    public function getReportCommande()
    {
        $em=$this->getDoctrine()->getRepository('MyServiceFoodBundle:CommandeArticle');
        $query=$em->createQueryBuilder('ca')
            ->join('ca.idCommande','c')
            ->join('ca.idArticle','a')
            ->join('a.idCategorie','ct')
            ->join('c.idServeur','e')
            ->addSelect('ca')
            ->addSelect('c')
            ->addSelect('a')
            ->addSelect('ct')
            ->addSelect('e')
            ->groupBy('c.numero, a.designation,ct.nom,ca.quantite,ca.prixUnitaire, ca.prixTotal,c.date,e.nom,e.prenom')
            ->select('c.numero, a.designation,ct.nom,ca.quantite,ca.prixUnitaire, ca.prixTotal,c.date,e.nom,e.prenom,count(0) ,sum(ca.prixTotal) ')
            ->getQuery();
        $restresult=$query->getResult();

        return $restresult;


    }
}