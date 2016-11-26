<?php

// src/AppBundle/Entity/Book.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="book")
 */
class Book
{
		/**
		 * @ORM\Column(type="guid")
		 * @ORM\Id
		 * @ORM\GeneratedValue(strategy="UUID")
		 */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $title;

    /**
     * @ORM\Column(type="string")
     */
    private $author;

    /**
     * @ORM\Column(type="string")
     */
    private $description;

    /**
     * @ORM\Column(type="string")
     */
    private $category;

    /**
     * @ORM\Column(type="string")
     */
    private $publisher;

		/**
		 * @ORM\Column(type="integer")
		 */
		private $date;

		/**
     * @ORM\Column(type="string")
     *
     *
     * @Assert\File(mimeTypes={ "image/*" })
     */
    private $cover;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isNew;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isBestseller;

		/**
     * @ORM\Column(type="boolean")
     */
    private $isDiscount;

		/**
     * @ORM\Column(type="integer")
     */
    private $price;

		/**
     * @ORM\Column(type="integer")
     */
    private $discountPrice;

    /**
     * @ORM\Column(type="integer")
     */
    private $rating;

		/**
     * @ORM\Column(type="integer")
     */
    private $votes;


    public function __construct() {

   }

	 public function create($title, $author,$description,$category,$publisher,$cover,$date,$isNew,$isBestseller, $isDiscount, $price, $discountPrice) {
		 $instance = new self();
		 $instance->setTitle($title);
		 $instance->setAuthor($author);
		 $instance->setDescription($description);
		 $instance->setCategory($category);
		 $instance->setPublisher($publisher);
		 $instance->setCover($cover);
		 $instance->setDate($date);
		 $instance->setIsNew($isNew);
		 $instance->setIsBestseller($isBestseller);
		 $instance->setIsDiscount($isDiscount);
		 $instance->setPrice($price);
		 $instance->setDiscountPrice($discountPrice);
		 $instance->setRating(0);
		 $instance->setVotes(0);
		 return $instance;
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
     * Set title
     *
     * @param string $title
     *
     * @return Book
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
     * Set author
     *
     * @param string $author
     *
     * @return Book
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Book
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
     * Set category
     *
     * @param string $category
     *
     * @return Book
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
     * Set publisher
     *
     * @param string $publisher
     *
     * @return Book
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;

        return $this;
    }

    /**
     * Get publisher
     *
     * @return string
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * Set date
     *
     * @param integer $date
     *
     * @return Book
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return integer
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set cover
     *
     * @param string $cover
     *
     * @return Book
     */
    public function setCover($cover)
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * Get cover
     *
     * @return string
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * Set isNew
     *
     * @param boolean $isNew
     *
     * @return Book
     */
    public function setIsNew($isNew)
    {
        $this->isNew = $isNew;

        return $this;
    }

    /**
     * Get isNew
     *
     * @return boolean
     */
    public function getIsNew()
    {
        return $this->isNew;
    }

    /**
     * Set isBestseller
     *
     * @param boolean $isBestseller
     *
     * @return Book
     */
    public function setIsBestseller($isBestseller)
    {
        $this->isBestseller = $isBestseller;

        return $this;
    }

    /**
     * Get isBestseller
     *
     * @return boolean
     */
    public function getIsBestseller()
    {
        return $this->isBestseller;
    }

    /**
     * Set isDiscount
     *
     * @param boolean $isDiscount
     *
     * @return Book
     */
    public function setIsDiscount($isDiscount)
    {
        $this->isDiscount = $isDiscount;

        return $this;
    }

    /**
     * Get isDiscount
     *
     * @return boolean
     */
    public function getIsDiscount()
    {
        return $this->isDiscount;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Book
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set discountPrice
     *
     * @param integer $discountPrice
     *
     * @return Book
     */
    public function setDiscountPrice($discountPrice)
    {
        $this->discountPrice = $discountPrice;

        return $this;
    }

    /**
     * Get discountPrice
     *
     * @return integer
     */
    public function getDiscountPrice()
    {
        return $this->discountPrice;
    }

    /**
     * Set rating
     *
     * @param integer $rating
     *
     * @return Book
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
				// $this->rating = [];
				// array_push($this->rating, $rating);

        return $this;
    }

    /**
     * Get rating
     *
     * @return integer
     */
    public function getRating()
    {
        return $this->rating;
    }

		/**
		 * Set votes
		 *
		 * @param integer $votes
		 *
		 * @return Book
		 */
		public function setVotes($votes)
		{
				$this->votes = $votes;

				return $this;
		}

		/**
		 * Get votes
		 *
		 * @return integer
		 */
		public function getVotes()
		{
				return $this->votes;
		}
}
