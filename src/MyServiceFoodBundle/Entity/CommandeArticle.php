<?php

namespace MyServiceFoodBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommandeArticle
 *
 * @ORM\Table(name="commande_article", indexes={@ORM\Index(name="FK1oj919k5kluteecator3cr33n", columns={"id_article"}), @ORM\Index(name="FKp7o0b8tl4dw3ipdwnbwq5ifvr", columns={"id_commande"}), @ORM\Index(name="FKepfr6njnymsrn9yodn10ptnwf", columns={"id_cuisinier"})})
 * @ORM\Entity
 */
class CommandeArticle
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_commande_article", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCommandeArticle;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_total", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixTotal;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_unitaire", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixUnitaire;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="bigint", nullable=true)
     */
    private $quantite;

    /**
     * @var integer
     *
     * @ORM\Column(name="statut", type="integer", nullable=false)
     */
    private $statut = '0';

    /**
     * @var \Article
     *
     * @ORM\ManyToOne(targetEntity="Article")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_article", referencedColumnName="id_article")
     * })
     */
    private $idArticle;

    /**
     * @var \Employe
     *
     * @ORM\ManyToOne(targetEntity="Employe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cuisinier", referencedColumnName="id_employe")
     * })
     */
    private $idCuisinier;

    /**
     * @var \Commande
     *
     * @ORM\ManyToOne(targetEntity="Commande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_commande", referencedColumnName="id_commande")
     * })
     */
    private $idCommande;



    /**
     * Get idCommandeArticle
     *
     * @return integer
     */
    public function getIdCommandeArticle()
    {
        return $this->idCommandeArticle;
    }

    /**
     * Set prixTotal
     *
     * @param float $prixTotal
     *
     * @return CommandeArticle
     */
    public function setPrixTotal($prixTotal)
    {
        $this->prixTotal = $prixTotal;

        return $this;
    }

    /**
     * Get prixTotal
     *
     * @return float
     */
    public function getPrixTotal()
    {
        return $this->prixTotal;
    }

    /**
     * Set prixUnitaire
     *
     * @param float $prixUnitaire
     *
     * @return CommandeArticle
     */
    public function setPrixUnitaire($prixUnitaire)
    {
        $this->prixUnitaire = $prixUnitaire;

        return $this;
    }

    /**
     * Get prixUnitaire
     *
     * @return float
     */
    public function getPrixUnitaire()
    {
        return $this->prixUnitaire;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return CommandeArticle
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set statut
     *
     * @param integer $statut
     *
     * @return CommandeArticle
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return integer
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set idArticle
     *
     * @param \MyServiceFoodBundle\Entity\Article $idArticle
     *
     * @return CommandeArticle
     */
    public function setIdArticle(\MyServiceFoodBundle\Entity\Article $idArticle = null)
    {
        $this->idArticle = $idArticle;

        return $this;
    }

    /**
     * Get idArticle
     *
     * @return \MyServiceFoodBundle\Entity\Article
     */
    public function getIdArticle()
    {
        return $this->idArticle;
    }

    /**
     * Set idCuisinier
     *
     * @param \MyServiceFoodBundle\Entity\Employe $idCuisinier
     *
     * @return CommandeArticle
     */
    public function setIdCuisinier(\MyServiceFoodBundle\Entity\Employe $idCuisinier = null)
    {
        $this->idCuisinier = $idCuisinier;

        return $this;
    }

    /**
     * Get idCuisinier
     *
     * @return \MyServiceFoodBundle\Entity\Employe
     */
    public function getIdCuisinier()
    {
        return $this->idCuisinier;
    }

    /**
     * Set idCommande
     *
     * @param \MyServiceFoodBundle\Entity\Commande $idCommande
     *
     * @return CommandeArticle
     */
    public function setIdCommande(\MyServiceFoodBundle\Entity\Commande $idCommande = null)
    {
        $this->idCommande = $idCommande;

        return $this;
    }

    /**
     * Get idCommande
     *
     * @return \MyServiceFoodBundle\Entity\Commande
     */
    public function getIdCommande()
    {
        return $this->idCommande;
    }
}
