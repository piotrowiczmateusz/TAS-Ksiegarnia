<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="category")
 */
class Category
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

    public function __construct($title) {
       $this->setTitle($title);
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
     * @return Category
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
}
