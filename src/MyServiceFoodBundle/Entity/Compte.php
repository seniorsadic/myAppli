<?php

namespace MyServiceFoodBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Compte
 *
 * @ORM\Table(name="compte", uniqueConstraints={@ORM\UniqueConstraint(name="UK_a0jr9j935oikjgxinnvwiwirq", columns={"login"})}, indexes={@ORM\Index(name="FK9g2yxidhplctl39r045vccwi9", columns={"id_employe"})})
 * @ORM\Entity
 */
class Compte
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_compte", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCompte;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=255, nullable=false)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=255, nullable=true)
     */
    private $role;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=255, nullable=true)
     */
    private $token;

    /**
     * @var \Employe
     *
     * @ORM\ManyToOne(targetEntity="Employe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_employe", referencedColumnName="id_employe")
     * })
     */
    private $idEmploye;



    /**
     * Get idCompte
     *
     * @return integer
     */
    public function getIdCompte()
    {
        return $this->idCompte;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return Compte
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Compte
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set role
     *
     * @param string $role
     *
     * @return Compte
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set token
     *
     * @param string $token
     *
     * @return Compte
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set idEmploye
     *
     * @param \MyServiceFoodBundle\Entity\Employe $idEmploye
     *
     * @return Compte
     */
    public function setIdEmploye(\MyServiceFoodBundle\Entity\Employe $idEmploye = null)
    {
        $this->idEmploye = $idEmploye;

        return $this;
    }

    /**
     * Get idEmploye
     *
     * @return \MyServiceFoodBundle\Entity\Employe
     */
    public function getIdEmploye()
    {
        return $this->idEmploye;
    }
}
