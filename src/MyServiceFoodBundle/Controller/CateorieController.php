<?php
namespace MyServiceFoodBundle\Controller;

use MyServiceFoodBundle\Entity\Categorie;

class CateorieController extends FOSResController
{
    /**
     * @Rest\Get("/categorie")
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
        $idCatalogue=$this->getDoctrine()->getRepository('MyServiceFoodBundle:Catalogue')->find('idCatalogue');
        $categorie= new Categorie();
        $categorie->setNom($nom);
        $categorie->setImageUrl($imageUrl);
        $categorie->setIdCatalogue($idCatalogue);
        $em=$this->getDoctrine()->getManager()->persist($categorie);
        $em->flush();
    }
    /**
     * @Rest\Put("/categories/{id}")
     */
    public function UpdateCategorie($id){
        $em = $this->getDoctrine()->getManager();
        $categorie = $em->getRepository(Product::class)->find($id);

        if (!$categorie) {
            throw $this->createNotFoundException(
                'No categorie found for id '.$id
            );
        }
        else{
            $nom=$categorie->get('nom');
            $imageUrl=$categorie->get('imageUrl');
            $idCatalogue=$categorie->get('idCatalogue');

            $categorie->setNom($nom);
            $categorie->setImageUrl($imageUrl);
            $categorie->setIdCatalogue($idCatalogue);
            $em=$this->getDoctrine()->getManager()->persist($categorie);
            $em->flush();
        }

    }

    public function DeleteCategorie($id){
        $em = $this->getDoctrine()->getManager();
        $categorie = $em->getRepository(Product::class)->find($id);

        if (!$categorie) {
            throw $this->createNotFoundException(
                'No categorie found for id '.$id
            );
        }
        else{
            $em->remove($categorie);
            $em->flush();
        }

    }

}