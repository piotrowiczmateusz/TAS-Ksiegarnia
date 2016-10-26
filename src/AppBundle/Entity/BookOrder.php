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
	 * @ORM\Column(type="guid")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="UUID")
	 */
		private $id;

		/**
		 * @ORM\Column(type="string")
		 */
    private $userId;

    /**
     * @ORM\Column(type="string")
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



		public function __construct($userId, $bookId, $orderDate, $orderType) {
			 $this->setuserId($userId);
			 $this->setbookId($bookId);
			 $this->setOrderDate($orderDate);
			 $this->setOrderType($orderType);
	 }

    /**
     * Get id
     *
     * @return guid
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userId
     *
     * @param string $userId
     *
     * @return BookOrder
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set bookId
     *
     * @param string $bookId
     *
     * @return BookOrder
     */
    public function setBookId($bookId)
    {
        $this->bookId = $bookId;

        return $this;
    }

    /**
     * Get bookId
     *
     * @return string
     */
    public function getBookId()
    {
        return $this->bookId;
    }

    /**
     * Set orderDate
     *
     * @param \DateTime $orderDate
     *
     * @return BookOrder
     */
    public function setOrderDate($orderDate)
    {
        $this->orderDate = $orderDate;

        return $this;
    }

    /**
     * Get orderDate
     *
     * @return \DateTime
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
     * @return BookOrder
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
}
