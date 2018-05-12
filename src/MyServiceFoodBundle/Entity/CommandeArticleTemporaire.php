<?php

namespace MyServiceFoodBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommandeArticleTemporaire
 *
 * @ORM\Table(name="commande_article_temporaire", indexes={@ORM\Index(name="FKnduy7bwqgihpfdlbrx8mtqqv3", columns={"id_article"}), @ORM\Index(name="FK1k3rs11lre3bkj73cqhdnyyep", columns={"id_compte"}), @ORM\Index(name="FKawj95q5vkbelwq3yxuye1ica9", columns={"id_employe"}), @ORM\Index(name="FKnai9871g9xt9iulbxxfjsb546", columns={"id_table"})})
 * @ORM\Entity
 */
class CommandeArticleTemporaire
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_commande_article_temporaire", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCommandeArticleTemporaire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var \Compte
     *
     * @ORM\ManyToOne(targetEntity="Compte")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_compte", referencedColumnName="id_compte")
     * })
     */
    private $idCompte;

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
     * @var \Tables
     *
     * @ORM\ManyToOne(targetEntity="Tables")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_table", referencedColumnName="id_table")
     * })
     */
    private $idTable;

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
     * Get idCommandeArticleTemporaire
     *
     * @return integer
     */
    public function getIdCommandeArticleTemporaire()
    {
        return $this->idCommandeArticleTemporaire;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return CommandeArticleTemporaire
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set idCompte
     *
     * @param \MyServiceFoodBundle\Entity\Compte $idCompte
     *
     * @return CommandeArticleTemporaire
     */
    public function setIdCompte(\MyServiceFoodBundle\Entity\Compte $idCompte = null)
    {
        $this->idCompte = $idCompte;

        return $this;
    }

    /**
     * Get idCompte
     *
     * @return \MyServiceFoodBundle\Entity\Compte
     */
    public function getIdCompte()
    {
        return $this->idCompte;
    }

    /**
     * Set idEmploye
     *
     * @param \MyServiceFoodBundle\Entity\Employe $idEmploye
     *
     * @return CommandeArticleTemporaire
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

    /**
     * Set idTable
     *
     * @param \MyServiceFoodBundle\Entity\Tables $idTable
     *
     * @return CommandeArticleTemporaire
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
     * Set idArticle
     *
     * @param \MyServiceFoodBundle\Entity\Article $idArticle
     *
     * @return CommandeArticleTemporaire
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
}
