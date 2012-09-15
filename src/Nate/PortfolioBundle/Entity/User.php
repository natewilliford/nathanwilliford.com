<?php
// src/Acme/UserBundle/Entity/User.php

namespace Nate\PortfolioBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="PortfolioEntry", mappedBy="author")
     */
    protected $portfolioEntries;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add portfolioEntries
     *
     * @param Nate\PortfolioBundle\Entity\PortfolioEntry $portfolioEntries
     * @return User
     */
    public function addPortfolioEntry(\Nate\PortfolioBundle\Entity\PortfolioEntry $portfolioEntries)
    {
        $this->portfolioEntries[] = $portfolioEntries;
    
        return $this;
    }

    /**
     * Remove portfolioEntries
     *
     * @param Nate\PortfolioBundle\Entity\PortfolioEntry $portfolioEntries
     */
    public function removePortfolioEntry(\Nate\PortfolioBundle\Entity\PortfolioEntry $portfolioEntries)
    {
        $this->portfolioEntries->removeElement($portfolioEntries);
    }

    /**
     * Get portfolioEntries
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getPortfolioEntries()
    {
        return $this->portfolioEntries;
    }
}