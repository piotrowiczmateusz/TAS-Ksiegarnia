<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
		/**
	 * @ORM\Column(type="guid")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="UUID")
	 */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

		/**
     * @ORM\Column(type="string", length=100)
     */
    private $surname;

		/**
		 * @ORM\Column(type="string")
		 */
		private $address;

		/**
		 * @ORM\Column(type="string")
		 */
		private $city;

		/**
		 * @ORM\Column(type="string")
		 */
		private $postalCode;

		/**
     * @ORM\Column(type="string")
     * @Assert\File(mimeTypes={ "image/*" })
     */
		private $avatar;

		/**
     * @ORM\Column(type="string")
     */
		private $ratedBooks;

    public function __construct() {
			parent::__construct();
   }

	 public function create($name, $surname, $address, $city, $postalCode, $avatar, $ratedBooks) {
		 $instance = new self();
		 $instance->setName($name);
		 $instance->setSurname($surname);
		 $instance->setAddress($address);
		 $instance->setCity($city);
		 $instance->setPostalCode($postalCode);
		 $instance->setAvatar($avatar);
		 $instance->setRatedBooks($ratedBooks);

		 return $instance;
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
     * Set name
     *
     * @param string $name
     *
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     *
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return User
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
     * Set postalCode
     *
     * @param string $postalCode
     *
     * @return User
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     *
     * @return User
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set ratedBooks
     *
     * @param string $ratedBooks
     *
     * @return User
     */
    public function setRatedBooks($ratedBooks)
    {
        $this->ratedBooks = $ratedBooks;

        return $this;
    }

    /**
     * Get ratedBooks
     *
     * @return string
     */
    public function getRatedBooks()
    {
        return $this->ratedBooks;
    }
}
