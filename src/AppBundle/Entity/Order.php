<?php

// src/AppBundle/Entity/Order.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="order")
 */
class Order
{
	/**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
		private $id;

		/**
		 * @ORM\Column(type="integer")
		 */
    private $userID;

    /**
     * @ORM\Column(type="integer")
     */
    private $bookID;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string")
     */
    private $type;

    public function __construct($userID, $bookID, $type) {
       $this->setUserID($userID);
       $this->setBookID($bookID);
       $this->setType($type);
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
     * Set userID
     *
     * @param integer $userID
     *
     * @return Order
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;

        return $this;
    }

    /**
     * Get userID
     *
     * @return integer
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * Set bookID
     *
     * @param integer $bookID
     *
     * @return Order
     */
    public function setBookID($bookID)
    {
        $this->bookID = $bookID;

        return $this;
    }

    /**
     * Get bookID
     *
     * @return integer
     */
    public function getBookID()
    {
        return $this->bookID;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Order
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
     * Set type
     *
     * @param string $type
     *
     * @return Order
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
