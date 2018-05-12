<?php

namespace MyServiceFoodBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Employe
 *
 * @ORM\Table(name="employe", uniqueConstraints={@ORM\UniqueConstraint(name="UK_sewfj92skjm3geoc0usfber43", columns={"matricule"})}, indexes={@ORM\Index(name="FKsmpk8x2m3u86pb2sljxayv1j1", columns={"id_cuisine"}), @ORM\Index(name="FKesx2ng44mwxx0gmfskn70hdhi", columns={"id_resto"})})
 * @ORM\Entity
 */
class Employe
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_employe", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEmploye;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="fonction", type="string", length=255, nullable=true)
     */
    private $fonction;

    /**
     * @var string
     *
     * @ORM\Column(name="matricule", type="string", length=255, nullable=false)
     */
    private $matricule;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255, nullable=true)
     */
    private $telephone;

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
     * @var \Cuisine
     *
     * @ORM\ManyToOne(targetEntity="Cuisine")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cuisine", referencedColumnName="id_cuisine")
     * })
     */
    private $idCuisine;



    /**
     * Get idEmploye
     *
     * @return integer
     */
    public function getIdEmploye()
    {
        return $this->idEmploye;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Employe
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set fonction
     *
     * @param string $fonction
     *
     * @return Employe
     */
    public function setFonction($fonction)
    {
        $this->fonction = $fonction;

        return $this;
    }

    /**
     * Get fonction
     *
     * @return string
     */
    public function getFonction()
    {
        return $this->fonction;
    }

    /**
     * Set matricule
     *
     * @param string $matricule
     *
     * @return Employe
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get matricule
     *
     * @return string
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Employe
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Employe
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Employe
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set imageUrl
     *
     * @param string $imageUrl
     *
     * @return Employe
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
     * @return Employe
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

    /**
     * Set idCuisine
     *
     * @param \MyServiceFoodBundle\Entity\Cuisine $idCuisine
     *
     * @return Employe
     */
    public function setIdCuisine(\MyServiceFoodBundle\Entity\Cuisine $idCuisine = null)
    {
        $this->idCuisine = $idCuisine;

        return $this;
    }

    /**
     * Get idCuisine
     *
     * @return \MyServiceFoodBundle\Entity\Cuisine
     */
    public function getIdCuisine()
    {
        return $this->idCuisine;
    }
}
