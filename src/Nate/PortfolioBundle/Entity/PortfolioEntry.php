<?php

namespace Nate\PortfolioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="portfolio")
*/
class PortfolioEntry
{
    /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="portfolioEntries")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    protected $author;

    /**
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @ORM\Column(type="text")
     */
    protected $body;

    /**
     * @ORM\Column(type="string")
     */
    protected $link;

    /**
     * @ORM\ManyToMany(targetEntity="Image")
     */
    protected $images;

    /**
     * @ORM\ManyToMany(targetEntity="TechBadge")
     */
    protected $techBadges;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated;

    public function __construct()
    {
        $this->setCreated(new \DateTime());
        $this->setUpdated(new \DateTime());
    }

    /**
     * @ORM\preUpdate
     */
    public function setUpdatedValue()
    {
        $this->setUpdated(new \DateTime());
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
     * Set title
     *
     * @param string $title
     * @return PortfolioEntry
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return PortfolioEntry
     */
    public function setBody($body)
    {
        $this->body = $body;
    
        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set link
     *
     * @param string $link
     * @return PortfolioEntry
     */
    public function setLink($link)
    {
        $this->link = $link;
    
        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return PortfolioEntry
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return PortfolioEntry
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    
        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set author
     *
     * @param Nate\PortfolioBundle\Entity\User $author
     * @return PortfolioEntry
     */
    public function setAuthor(\Nate\PortfolioBundle\Entity\User $author = null)
    {
        $this->author = $author;
    
        return $this;
    }

    /**
     * Get author
     *
     * @return Nate\PortfolioBundle\Entity\User 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Add images
     *
     * @param Nate\PortfolioBundle\Entity\Image $images
     * @return PortfolioEntry
     */
    public function addImage(\Nate\PortfolioBundle\Entity\Image $images)
    {
        $this->images[] = $images;
    
        return $this;
    }

    /**
     * Remove images
     *
     * @param Nate\PortfolioBundle\Entity\Image $images
     */
    public function removeImage(\Nate\PortfolioBundle\Entity\Image $images)
    {
        $this->images->removeElement($images);
    }

    /**
     * Get images
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Add techBadges
     *
     * @param Nate\PortfolioBundle\Entity\TechBadge $techBadges
     * @return PortfolioEntry
     */
    public function addTechBadge(\Nate\PortfolioBundle\Entity\TechBadge $techBadges)
    {
        $this->techBadges[] = $techBadges;
    
        return $this;
    }

    /**
     * Remove techBadges
     *
     * @param Nate\PortfolioBundle\Entity\TechBadge $techBadges
     */
    public function removeTechBadge(\Nate\PortfolioBundle\Entity\TechBadge $techBadges)
    {
        $this->techBadges->removeElement($techBadges);
    }

    /**
     * Get techBadges
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getTechBadges()
    {
        return $this->techBadges;
    }
}