<?php

namespace MyServiceFoodBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie", indexes={@ORM\Index(name="FKd4nnux3bd6nv6etdk7wnm885o", columns={"id_catalogue"})})
 * @ORM\Entity
 */
class Categorie
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_categorie", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCategorie;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="image_url", type="string", length=255, nullable=true)
     */
    private $imageUrl;

    /**
     * @var \Catalogue
     *
     * @ORM\ManyToOne(targetEntity="Catalogue")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_catalogue", referencedColumnName="id_catalogue")
     * })
     */
    private $idCatalogue;



    /**
     * Get idCategorie
     *
     * @return integer
     */
    public function getIdCategorie()
    {
        return $this->idCategorie;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Categorie
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set imageUrl
     *
     * @param string $imageUrl
     *
     * @return Categorie
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * Get imageUrl
     *
     * @return string
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * Set idCatalogue
     *
     * @param \MyServiceFoodBundle\Entity\Catalogue $idCatalogue
     *
     * @return Categorie
     */
    public function setIdCatalogue(\MyServiceFoodBundle\Entity\Catalogue $idCatalogue = null)
    {
        $this->idCatalogue = $idCatalogue;

        return $this;
    }

    /**
     * Get idCatalogue
     *
     * @return \MyServiceFoodBundle\Entity\Catalogue
     */
    public function getIdCatalogue()
    {
        return $this->idCatalogue;
    }
}
