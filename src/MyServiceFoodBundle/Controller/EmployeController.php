<?php

namespace MyServiceFoodBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use MyServiceFoodBundle\Entity\Employe;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;

class EmployeController extends FOSRestController
{
    /**
     * @Rest\Get("/employes")
     */
    public function getAllEmploye()
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Employe')->findAll();
        return $restresult;
    }

    /**
     * @Rest\Get("/employes/{id}")
     */
    public function getAllEmployeId($id)
    {
        return $this->getDoctrine()->getRepository('MyServiceFoodBundle:Employe')->find($id);
    }

    /**
     * @Rest\Post("/employes")
     */
    public function addEmploye(Request $request)
    {
        $email=$request->get('email');
        $fonction=$request->get('fonction');
        $matricule=$request->get('matricule');
		$nom=$request->get('nom');
		$prenom=$request->get('prenom');
	    $telephone=$request->get('telephone');
		$imageUrl=$request->get('imageUrl');
        $idResto = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Restaurant')->find($request->get('idResto'));
        $idCuisine = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Cuisine')->find($request->get('idCuisine'));

        // Initialiser
        $employe=new Employe();
        $employe->setEmail($email);
        $employe->setFonction($fonction);
        $employe->setMatricule($matricule);
		$employe->setNom($nom);
		$employe->setPrenom($prenom);
	    $employe->setTelephone($telephone);
		$employe->setImageUrl($imageUrl);
        $employe->setIdResto($idResto);
        $employe->setIdCuisine($idCuisine);
    
        $em = $this->getDoctrine()->getManager();
        $em->persist($employe);
        $em->flush();
        return $employe;
    }

    /**
     * @Rest\Put("/employes/{id}")
     */
    public function upemailEmploye($id, Request $request)
    {
        $email=$request->get('email');
        $fonction=$request->get('fonction');
        $matricule=$request->get('matricule');
		$nom=$request->get('nom');
		$prenom=$request->get('prenom');
	    $telephone=$request->get('telephone');
		$imageUrl=$request->get('imageUrl');
        $idResto =$request->get('idResto');
        $idCuisine = $request->get('idCuisine');
       

        $sn = $this->getDoctrine()->getManager();
        $employe = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Employe')->find($id);
        if(!empty($email)){
            $employe->setemail($email);
            $sn->flush();
        }
        if(!empty($fonction)){
            $employe->setfonction($fonction);
            $sn->flush();
        }
        if(!empty($matricule)){
            $employe->setmatricule($matricule);
            $sn->flush();
        }
		if(!empty($nom)){
            $employe->setNom($nom);
            $sn->flush();
        }
		if(!empty($prenom)){
            $employe->setPrenom($prenom);
            $sn->flush();
        }
		if(!empty($telephone)){
            $employe->setTelephone($telephone);
            $sn->flush();
        }
		if(!empty($imageUrl)){
            $Employe->setImageUrl($imageUrl);
            $sn->flush();
        }
        if(!empty($idResto)){
            $idResto = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Restaurant')->find($idResto);
            $employe->setIdResto($idResto);
            $sn->flush();
        }

        if(!empty($idCuisine)){
            $idCuisine = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Cuisine')->find($idCuisine);
            $employe->setIdCuisine($idCuisine);
            $sn->flush();
        }
       
        return $employe;

    }

    /**
     * @Rest\Delete("/employes/{id}")
     */
    public function deleteEmploye($id)
    {
        $sn = $this->getDoctrine()->getManager();
        $Employe = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Employe')->find($id);
        if (empty($Employe)) {
            return FALSE;
        }
        else {
            $sn->remove($Employe);
            $sn->flush();
        }
        return TRUE;
    }
}
