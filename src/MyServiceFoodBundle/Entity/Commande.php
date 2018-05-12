<?php

namespace MyServiceFoodBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande", indexes={@ORM\Index(name="FKls4tu9udpkuu4ajncadt7iack", columns={"id_comptable"}), @ORM\Index(name="FK8sx2joni6ihxdkhqn6tujuqkj", columns={"id_cuisinier"}), @ORM\Index(name="FKdll5kq43j1etbnx1gdttpnvtv", columns={"id_serveur"}), @ORM\Index(name="FKfymbwwqaetnxrvu2ak1u0x296", columns={"id_table"})})
 * @ORM\Entity
 */
class Commande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_commande", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCommande;

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=255, nullable=true)
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="bigint", nullable=true)
     */
    private $numero;

    /**
     * @var integer
     *
     * @ORM\Column(name="statut", type="integer", nullable=false)
     */
    private $statut;

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
     * @var \Employe
     *
     * @ORM\ManyToOne(targetEntity="Employe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_serveur", referencedColumnName="id_employe")
     * })
     */
    private $idServeur;

    /**
     * @var \Tables
     *
     * @ORM\ManyToOne(targetEntity="Tables")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_table", referencedColumnName="id_table")
     * })
     */
    private $idTable;

    /**
     * @var \Employe
     *
     * @ORM\ManyToOne(targetEntity="Employe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_comptable", referencedColumnName="id_employe")
     * })
     */
    private $idComptable;



    /**
     * Get idCommande
     *
     * @return integer
     */
    public function getIdCommande()
    {
        return $this->idCommande;
    }

    /**
     * Set date
     *
     * @param string $date
     *
     * @return Commande
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     *
     * @return Commande
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set statut
     *
     * @param integer $statut
     *
     * @return Commande
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
     * Set idCuisinier
     *
     * @param \MyServiceFoodBundle\Entity\Employe $idCuisinier
     *
     * @return Commande
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
     * Set idServeur
     *
     * @param \MyServiceFoodBundle\Entity\Employe $idServeur
     *
     * @return Commande
     */
    public function setIdServeur(\MyServiceFoodBundle\Entity\Employe $idServeur = null)
    {
        $this->idServeur = $idServeur;

        return $this;
    }

    /**
     * Get idServeur
     *
     * @return \MyServiceFoodBundle\Entity\Employe
     */
    public function getIdServeur()
    {
        return $this->idServeur;
    }

    /**
     * Set idTable
     *
     * @param \MyServiceFoodBundle\Entity\Tables $idTable
     *
     * @return Commande
     */
    public function setIdTable(\MyServiceFoodBundle\Entity\Tables $idTable = null)
    {
        $this->idTable = $idTable;

        return $this;
    }

    /**
     * Get idTable
     *
     * @return \MyServiceFoodBundle\Entity\Tables
     */
    public function getIdTable()
    {
        return $this->idTable;
    }

    /**
     * Set idComptable
     *
     * @param \MyServiceFoodBundle\Entity\Employe $idComptable
     *
     * @return Commande
     */
    public function setIdComptable(\MyServiceFoodBundle\Entity\Employe $idComptable = null)
    {
        $this->idComptable = $idComptable;

        return $this;
    }

    /**
     * Get idComptable
     *
     * @return \MyServiceFoodBundle\Entity\Employe
     */
    public function getIdComptable()
    {
        return $this->idComptable;
    }
}
