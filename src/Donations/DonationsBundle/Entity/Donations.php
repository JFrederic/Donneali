<?php

namespace Donations\DonationsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Donations
 *
 * @ORM\Table(name="donations")
 * @ORM\Entity(repositoryClass="Donations\DonationsBundle\Repository\DonationsRepository")
 */
class Donations
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var bool
     *
     * @ORM\Column(name="available", type="boolean")
     */
    private $available;
    
    //Relation pour définir l'utilisateur qui fait le don
     /**
      * @ORM\ManyToOne(targetEntity="Users\UsersBundle\Entity\Users", inversedBy="donations")
      */
    private $user;
    
    //Relation pour définir l'association qui a reçut le don après validation de l'utilisateur
    /**
      * @ORM\ManyToOne(targetEntity="Users\UsersBundle\Entity\Users", inversedBy="donationgetted")
      */
    private $association;
    
    //Relation pour définir les demandes des associations sur ce don
    /**
      * @ORM\ManyToMany(targetEntity="Users\UsersBundle\Entity\Users", inversedBy="donationasked")
      */
    private $associationsask;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Donations
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Donations
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
     * Set city
     *
     * @param string $city
     *
     * @return Donations
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Donations
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Donations
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
     * Set available
     *
     * @param boolean $available
     *
     * @return Donations
     */
    public function setAvailable($available)
    {
        $this->available = $available;

        return $this;
    }

    /**
     * Get available
     *
     * @return bool
     */
    public function getAvailable()
    {
        return $this->available;
    }


    /**
     * Set user
     *
     * @param \Users\UsersBundle\Entity\Users $user
     *
     * @return Donations
     */
    public function setUser(\Users\UsersBundle\Entity\Users $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Users\UsersBundle\Entity\Users
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set association
     *
     * @param \Users\UsersBundle\Entity\Users $association
     *
     * @return Donations
     */
    public function setAssociation(\Users\UsersBundle\Entity\Users $association = null)
    {
        $this->association = $association;

        return $this;
    }

    /**
     * Get association
     *
     * @return \Users\UsersBundle\Entity\Users
     */
    public function getAssociation()
    {
        return $this->association;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->associationsask = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add associationsask
     *
     * @param \Users\UsersBundle\Entity\Users $associationsask
     *
     * @return Donations
     */
    public function addAssociationsask(\Users\UsersBundle\Entity\Users $associationsask)
    {
        $this->associationsask[] = $associationsask;

        return $this;
    }

    /**
     * Remove associationsask
     *
     * @param \Users\UsersBundle\Entity\Users $associationsask
     */
    public function removeAssociationsask(\Users\UsersBundle\Entity\Users $associationsask)
    {
        $this->associationsask->removeElement($associationsask);
    }

    /**
     * Get associationsask
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAssociationsask()
    {
        return $this->associationsask;
    }
}
