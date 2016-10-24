<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="book_order")
 */
class BookOrder
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
    private $userId;

    /**
     * @ORM\Column(type="integer")
     */
    private $bookId;

    /**
     * @ORM\Column(type="datetime")
     */
    private $orderDate;

    /**
     * @ORM\Column(type="string")
     */
    private $orderType;

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
     * Set userId
     *
     * @param integer $userId
     *
     * @return Order
     */
    public function setuserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getuserId()
    {
        return $this->userId;
    }

    /**
     * Set bookId
     *
     * @param integer $bookId
     *
     * @return Order
     */
    public function setbookId($bookId)
    {
        $this->bookId = $bookId;

        return $this;
    }

    /**
     * Get bookId
     *
     * @return integer
     */
    public function getbookId()
    {
        return $this->bookId;
    }

    /**
     * Set orderDate
     *
     * @param \datetime $orderDate
     *
     * @return Order
     */
    public function setOrderDate($orderDate)
    {
        $this->orderDate = $orderDate;

        return $this;
    }

    /**
     * Get orderDate
     *
     * @return \datetime
     */
    public function getOrderDate()
    {
        return $this->orderDate;
    }

    /**
     * Set orderType
     *
     * @param string $orderType
     *
     * @return Order
     */
    public function setOrderType($orderType)
    {
        $this->orderType = $orderType;

        return $this;
    }

    /**
     * Get orderType
     *
     * @return string
     */
    public function getOrderType()
    {
        return $this->orderType;
    }

		public function __construct($userId, $bookId, $orderDate, $orderType) {
			 $this->setuserId($userId);
			 $this->setbookId($bookId);
			 $this->setOrderDate($orderDate);
			 $this->setOrderType($orderType);
	 }
}
