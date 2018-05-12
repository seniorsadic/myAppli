<?php

namespace MyServiceFoodBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Catalogue
 *
 * @ORM\Table(name="catalogue", indexes={@ORM\Index(name="FKp4n67r10q2y3h1qaklicn4u3w", columns={"id_resto"})})
 * @ORM\Entity
 */
class Catalogue
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_catalogue", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCatalogue;

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
     * @var \Restaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_resto", referencedColumnName="id_resto")
     * })
     */
    private $idResto;



    /**
     * Get idCatalogue
     *
     * @return integer
     */
    public function getIdCatalogue()
    {
        return $this->idCatalogue;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Catalogue
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
     * @return Catalogue
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
     * @return Catalogue
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
