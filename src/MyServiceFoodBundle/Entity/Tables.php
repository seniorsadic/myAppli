<?php

namespace MyServiceFoodBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tables
 *
 * @ORM\Table(name="tables")
 * @ORM\Entity
 */
class Tables
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_table", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTable;

    /**
     * @var integer
     *
     * @ORM\Column(name="nombre_place", type="integer", nullable=false)
     */
    private $nombrePlace;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer", nullable=false)
     */
    private $numero;



    /**
     * Get idTable
     *
     * @return integer
     */
    public function getIdTable()
    {
        return $this->idTable;
    }

    /**
     * Set nombrePlace
     *
     * @param integer $nombrePlace
     *
     * @return Tables
     */
    public function setNombrePlace($nombrePlace)
    {
        $this->nombrePlace = $nombrePlace;

        return $this;
    }

    /**
     * Get nombrePlace
     *
     * @return integer
     */
    public function getNombrePlace()
    {
        return $this->nombrePlace;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     *
     * @return Tables
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
}
