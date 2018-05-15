<?php

namespace MyServiceFoodBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use MyServiceFoodBundle\Entity\Commande;
use Symfony\Component\HttpFoundation\Request;

class CommandeController extends FOSRestController
{
    /**
     * @Rest\Get("/commandes")
     */
    public function getAllCommande()
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Commande')->findAll();
        return $restresult;
    }

    /**
     * @Rest\Get("/commandes/{id}")
     */
    public function getAllCommandeId($id)
    {
        return $this->getDoctrine()->getRepository('MyServiceFoodBundle:Commande')->find($id);
    }

    /**
     * @Rest\Get("/commandesbystatut/{statut}")
     */
    public function getStatut($statut)
    {
        return $this->getDoctrine()->getRepository('MyServiceFoodBundle:Commande')->findBy(array('statut'=>$statut));
    }

    /**
     * @Rest\Post("/commandesbycomptable")
     */
    public function getcommandesbycomptable(Request $request)
    {
        $idcomptable=$request->get('idComptable');
        $comptable=$this->getDoctrine()->getRepository('MyServiceFoodBundle:Employe')->find($idcomptable);
        return $this->getDoctrine()->getRepository('MyServiceFoodBundle:Commande')->findBy(array('idComptable'=>$comptable));
    }

    /**
     * @Rest\Get("/comptableCommandesDuJour/{comptable}")
     */
    public function getcomptableCommandesDuJour($comptable)
    {
        $em = $this->getDoctrine()->getManager();
        $compte=$this->getDoctrine()->getRepository('MyServiceFoodBundle:Employe')->find($comptable);
        $c=date_format(new \DateTime(),'d-m-Y');
        $query = $em->createQuery(
            'SELECT c
                FROM  
                MyServiceFoodBundle:Commande c
                WHERE  c.date like :x and c.idComptable= :y'
        )->setParameter('x', $c.'%')
        ->setParameter('y', $compte->getIdEmploye());

        return $query->getResult();
    }

    /**
     * @Rest\Post("/commandes")
     */
    public function addCommande(Request $request)
    {
        $numero=$request->get('numero');
        $statut=$request->get('statut');
        $idCuisinier=$request->get('idCuisinier');
        $idServeur=$request->get('idServeur');
        $idComptable=$request->get('idComptable');
        $idTable=$request->get('idTable');
        $idServeur = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Employe')->find($request->get('idServeur'));
        $idTable = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Tables')->find($request->get('idTable'));

        
        // Initialiser
        $commande=new Commande();
        $commande->setDate(date_format(new \DateTime(),'d-m-Y H:i:s'));
        $commande->setNumero($numero);
        $commande->setStatut($statut);
        $commande->setIdServeur($idServeur);
        $commande->setIdTable($idTable);
        $em = $this->getDoctrine()->getManager();
        $em->persist($commande);
        $em->flush();
        return $commande;
    }

    /**
     * @Rest\Put("/commandes/{id}")
     */
    public function updateCommande($id, Request $request)
    {
        
        $statut=$request->get('statut');   
        $idCuisinier =$request->get('idCuisinier');
        $idComptable = $request->get('idComptable');
        $idTable = $request->get('idTable');

        $sn = $this->getDoctrine()->getManager();
        $commande = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Commande')->find($id);
        
        if(!empty($statut)){
            $commande->setStatut($statut);
            $sn->flush();
        }
        if(!empty($idCuisinier)){
            $cuisinier = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Employe')->find($idCuisinier);
            $commande->setIdCuisinier($cuisinier);
            $sn->flush();
        }

        if(!empty($idComptable)){
            $serveur = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Employe')->find($idComptable);
            $commande->setIdComptable($serveur);
            $sn->flush();
        }
        if(!empty($idTable)){
            $table = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Table')->find($idTable);
            $commande->setIdTable($table);
            $sn->flush();
        }
        return $commande;

    }

    /**
     * @Rest\Delete("/commandes/{id}")
     */
    public function deleteCommande($id)
    {
        $sn = $this->getDoctrine()->getManager();
        $commande = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Commande')->find($id);
        if (empty($commande)) {
            return FALSE;
        }
        else {
            $sn->remove($commande);
            $sn->flush();
        }
        return TRUE;
    }
}
