<?php

namespace Users\UsersBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class Users extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=13)
     */
    private $phone;
    
    /**
     * @var bool
     *
     * @ORM\Column(name="type", type="boolean")
     */
    protected $type;
    
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;


    //Relation pour définir le don de l'utilisateur
    /**
     * @ORM\OneToMany(targetEntity="Donations\DonationsBundle\Entity\Donations", mappedBy="user")
     */
    protected $donations;
    
    //Relation pour définir tout les dons reçuent par l'association.
    /**
     * @ORM\OneToMany(targetEntity="Donations\DonationsBundle\Entity\Donations", mappedBy="association")
     */
    protected $donationgetted;
    
    //Relation pour définir les dons demandés par l'association.
    /**
      * @ORM\ManyToMany(targetEntity="Donations\DonationsBundle\Entity\Donations", mappedBy="associationsask")
      */
    protected $donationasked;


    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
    

    /**
     * Add donation
     *
     * @param \Donations\DonationsBundle\Entity\Donations $donation
     *
     * @return Users
     */
    public function addDonation(\Donations\DonationsBundle\Entity\Donations $donation)
    {
        $this->donations[] = $donation;

        return $this;
    }

    /**
     * Remove donation
     *
     * @param \Donations\DonationsBundle\Entity\Donations $donation
     */
    public function removeDonation(\Donations\DonationsBundle\Entity\Donations $donation)
    {
        $this->donations->removeElement($donation);
    }

    /**
     * Get donations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDonations()
    {
        return $this->donations;
    }

    /**
     * Add donationgetted
     *
     * @param \Donations\DonationsBundle\Entity\Donations $donationgetted
     *
     * @return Users
     */
    public function addDonationgetted(\Donations\DonationsBundle\Entity\Donations $donationgetted)
    {
        $this->donationgetted[] = $donationgetted;

        return $this;
    }

    /**
     * Remove donationgetted
     *
     * @param \Donations\DonationsBundle\Entity\Donations $donationgetted
     */
    public function removeDonationgetted(\Donations\DonationsBundle\Entity\Donations $donationgetted)
    {
        $this->donationgetted->removeElement($donationgetted);
    }

    /**
     * Get donationgetted
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDonationgetted()
    {
        return $this->donationgetted;
    }

    /**
     * Add donationasked
     *
     * @param \Donations\DonationsBundle\Entity\Donations $donationasked
     *
     * @return Users
     */
    public function addDonationasked(\Donations\DonationsBundle\Entity\Donations $donationasked)
    {
        $this->donationasked[] = $donationasked;

        return $this;
    }

    /**
     * Remove donationasked
     *
     * @param \Donations\DonationsBundle\Entity\Donations $donationasked
     */
    public function removeDonationasked(\Donations\DonationsBundle\Entity\Donations $donationasked)
    {
        $this->donationasked->removeElement($donationasked);
    }

    /**
     * Get donationasked
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDonationasked()
    {
        return $this->donationasked;
    }

    /**
     * Set type
     *
     * @param boolean $type
     *
     * @return Users
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return boolean
     */
    public function getType()
    {
        return $this->type;
    }
}
