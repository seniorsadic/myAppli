<?php

namespace MyServiceFoodBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cuisine
 *
 * @ORM\Table(name="cuisine", indexes={@ORM\Index(name="FKlyggj8oo49wbn6mx7a3krbtxi", columns={"id_resto"})})
 * @ORM\Entity
 */
class Cuisine
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_cuisine", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCuisine;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="image_url", type="string", length=255, nullable=true)
     */
    private $imageUrl;

    /**
     * @var \Restaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_resto", referencedColumnName="id_resto")
     * })
     */
    private $idResto;



    /**
     * Get idCuisine
     *
     * @return integer
     */
    public function getIdCuisine()
    {
        return $this->idCuisine;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Cuisine
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
     * Set type
     *
     * @param string $type
     *
     * @return Cuisine
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set imageUrl
     *
     * @param string $imageUrl
     *
     * @return Cuisine
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
     * Set idResto
     *
     * @param \MyServiceFoodBundle\Entity\Restaurant $idResto
     *
     * @return Cuisine
     */
    public function setIdResto(\MyServiceFoodBundle\Entity\Restaurant $idResto = null)
    {
        $this->idResto = $idResto;

        return $this;
    }

    /**
     * Get idResto
     *
     * @return \MyServiceFoodBundle\Entity\Restaurant
     */
    public function getIdResto()
    {
        return $this->idResto;
    }
}
