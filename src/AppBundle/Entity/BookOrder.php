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
    private $books;

    /**
     * @ORM\Column(type="datetime")
     */
    private $orderDate;


		public function __construct($userId, $books, $orderDate) {
			 $this->setuserId($userId);
			 $this->setbooks($books);
			 $this->setOrderDate($orderDate);
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
     * Set books
     *
     * @param string $books
     *
     * @return BookOrder
     */
    public function setBooks($books)
    {
        $this->books = $books;

        return $this;
    }

    /**
     * Get books
     *
     * @return string
     */
    public function getBooks()
    {
        return $this->books;
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

}
