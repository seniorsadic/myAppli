<?php
namespace MyServiceFoodBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use MyServiceFoodBundle\Entity\Categorie;

class CategorieController extends FOSRestController
{
    /**
     * @Rest\Get("/categories")
     */
    public function getAllCategorie()
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Categorie')->findAll();
        return $restresult;
    }
    
    /**
     * @Rest\Get("/categories/{id}")
     */
    public function getAllCategorieId($id)
    {
        return $this->getDoctrine()->getRepository('MyServiceFoodBundle:Categorie')->find($id);

    }

    /**
     * @Rest\Post("/categories")
     */
    public function  AddCategorie(Request $request){

        $nom=$request->get('nom');
        $imageUrl=$request->get('imageUrl');
        $idCatalogue=$this->getDoctrine()->getRepository('MyServiceFoodBundle:Catalogue')->find($request->get('idCatalogue'));
        $categorie= new Categorie();
        $categorie->setNom($nom);
        $categorie->setImageUrl($imageUrl);
        $categorie->setIdCatalogue($idCatalogue);
        $em=$this->getDoctrine()->getManager();
        $em->persist($categorie);
        $em->flush();
        return $categorie;
    }

    /**
     * @Rest\Put("/categories/{id}")
     */
    public function UpdateCategorie(Request $request,$id){
        $em = $this->getDoctrine()->getManager();
        $categorie = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Categorie')->find($id);

        if (!$categorie) {
            throw $this->createNotFoundException(
                'No categorie found for id '.$id
            );
        }
        else{

            $nom=$request->get('nom');
            $imageUrl=$request->get('imageUrl');
            $idCatalogue=$request->get('idCatalogue');
            if(!empty($imageUrl)){
                $categorie->setImageUrl($imageUrl);
            }
            if(!empty($nom)){

                $categorie->setNom($nom);
            }
            if(!empty($idCatalogue)){
                $catalogue=$this->getDoctrine()->getRepository('MyServiceFoodBundle:Catalogue')->find($idCatalogue);
                $categorie->setIdCatalogue($catalogue);
            }
           
            $em->flush();
        }
        return $categorie;
    }

     /**
     * @Rest\Delete("/categories/{id}")
     */
    public function DeleteCategorie($id){
        $em = $this->getDoctrine()->getManager();
        $categorie = $this->getDoctrine()->getRepository('MyServiceFoodBundle:Categorie')->find($id);

        if (!$categorie) {
            return 'nok';
        }
        else{
            $em->remove($categorie);
            $em->flush();
            return 'ok';
        }

    }

}