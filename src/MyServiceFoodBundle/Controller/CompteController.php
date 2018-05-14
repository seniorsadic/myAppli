<?php
/**
 * Created by PhpStorm.
 * User: Michou
 * Date: 19/11/2017
 * Time: 12:50
 */
namespace MyServiceFoodBundle\Controller;

use MyServiceFoodBundle\Entity\Compte;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;

class CompteController extends FOSRestController
{
    /**
     * @Rest\Post("/comptes")
     */
    public function addCompte(Request $request)
    {
        $login=$request->get('login');
        $password=$request->get('password');
        $role=$request->get('role');
        $token=$request->get('token');
        $employe = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Employe')->find($request->get('idEmploye'));
        $compte=new Compte();
        $compte->setLogin($login);
        $compte->setPassword($password);
        $compte->setRole($role);
        $compte->setToken($token);
        $compte->setIdEmploye($employe);
        $em = $this->getDoctrine()->getManager();
        $em->persist($compte);
        $em->flush();
        return $compte;
    }

    /**
     * @Rest\Get("/comptes")
     */
    public function getAllCompte()
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Compte')->findAll();
        return $restresult;
    }

    /**
     * @Rest\Get("/comptes/{id}")
     */
    public function getCompteById($idCompte)
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Compte')->find($idCompte);
        return $restresult;
    }

    /**
     * @Rest\Put("/comptes/{id}")
     */
    public function udpdateCompte($idCompte,Request $request)
    {
        $login=$request->get('login');
        $password=$request->get('password');
        $role=$request->get('role');
        $token=$request->get('token');
        $employe = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Employe')->find($request->get('idEmploye'));
        $sn = $this->getDoctrine()->getManager();

        if(!empty($login)){
            $compte->setLogin($login);
            $sn->flush();
        }

        if(!empty($password)){
            $compte->setPassword($password);
            $sn->flush();
        }

        if(!empty($role)){
            $compte->setRole($role);
            $sn->flush();
        }

        if(!empty($token)){
            $compte->setToken($token);
            $sn->flush();
        }

        if(!empty($idEmploye)){
            $employe = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Employe')->find($idEmploye);
            $compte->setIdEmploye($employe);
            $sn->flush();
        }

        return $compte;
    }

    
    /**
     *@Rest\Delete("/comptes/{id}")
     */
    public function deleteCompte($idComptre)
    {
        $sn = $this->getDoctrine()->getManager();
        $compte = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Compte')->find($idCompte);

        if (empty($compte)) {
            return 'nok';
        }
        else {
            $sn->remove($compte);
            $sn->flush();
        }
        return 'ok';
    }

}