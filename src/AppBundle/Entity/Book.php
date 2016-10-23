<?php

// src/AppBundle/Entity/Book.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="book")
 */
class Book
{
	/**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
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
     * @ORM\Column(type="string")
     */
    private $price;

    /**
     * @ORM\Column(type="string")
     */
    private $rating;

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
     * Set isNew
     *
     * @param \boolean $isNew
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
     * @return \boolean
     */
    public function getIsNew()
    {
        return $this->isNew;
    }

    /**
     * Set isBestseller
     *
     * @param \boolean $isBestseller
     *
     * @return Book
     */
    public function setIsBestseller( $isBestseller)
    {
        $this->isBestseller = $isBestseller;

        return $this;
    }

    /**
     * Get isBestseller
     *
     * @return \boolean
     */
    public function getIsBestseller()
    {
        return $this->isBestseller;
    }

		/**
     * Set price
     *
     * @param  $price
     *
     * @return Book
     */
    public function setPrice( $price)
    {
        $this->price = $price;

        return $this;
    }

		/**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

		/**
		 * Set rating
		 *
		 * @param  $rating
		 *
		 * @return Book
		 */
		public function setRating( $rating)
		{
				$this->rating = $rating;

				return $this;
		}

		/**
     * Get rating
     *
     * @return string
     */
    public function getRating()
    {
        return $this->rating;
    }

    public function __construct($title, $author,$description,$category,$publisher,$cover,$date,$isNew,$isBestseller,$price) {
       $this->setTitle($title);
       $this->setAuthor($author);
			 $this->setDescription($description);
			 $this->setCategory($category);
			 $this->setPublisher($publisher);
			 $this->setCover($cover);
			 $this->setDate($date);
			 $this->setIsNew($isNew);
			 $this->setIsBestseller($isBestseller);
			 $this->setPrice($price);
			 $this->setRating("0");
   }

}
