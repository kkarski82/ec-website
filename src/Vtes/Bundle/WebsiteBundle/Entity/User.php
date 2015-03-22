<?php

namespace Vtes\Bundle\WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="search_idx", columns={"username"})})
 * @ORM\Entity
 * @UniqueEntity("username")
 */
class User
{
    //region attributes
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     * @Assert\Email()
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="vekn", type="string", length=7, nullable=true)
     */
    private $vekn;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=30)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=30)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=30)
     */
    private $country;

    /**
     * @var integer
     *
     * @ORM\Column(name="days", type="integer")
     */
    private $days;

    /**
     * @var integer
     *
     * @ORM\Column(name="room", type="integer")
     */
    private $room;

    /**
     * @var string
     *
     * @ORM\Column(name="roommate", type="string", length=64, nullable=true)
     */
    private $roommate;

    /**
     * @var string
     *
     * @ORM\Column(name="shirt", type="string", length=3)
     */
    private $shirt;
    //endregion

    //region getters
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
     * Get days
     *
     * @return integer
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * Get room
     *
     * @return integer
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Get vekn
     *
     * @return string
     */
    public function getVekn()
    {
        return $this->vekn;
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
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Get roommate
     *
     * @return string
     */
    public function getRoommate()
    {
        return $this->roommate;
    }

    /**
     * Get shirt
     *
     * @return string
     */
    public function getShirt()
    {
        return $this->shirt;
    }
    //endregion

    //region setters
    /**
     * Set days
     *
     * @param integer $days
     * @return User
     */
    public function setDays($days)
    {
        $this->days = $days;

        return $this;
    }

    /**
     * Set room
     *
     * @param integer $room
     * @return User
     */
    public function setRoom($room)
    {
        $this->room = $room;

        return $this;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Set vekn
     *
     * @param string $vekn
     * @return User
     */
    public function setVekn($vekn)
    {
        $this->vekn = $vekn;

        return $this;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set surname
     *
     * @param string $surname
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return User
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Set roommate
     *
     * @param string $roommate
     * @return User
     */
    public function setRoommate($roommate)
    {
        $this->roommate = $roommate;

        return $this;
    }

    /**
     * Set shirt
     *
     * @param string $shirt
     * @return User
     */
    public function setShirt($shirt)
    {
        $this->shirt = $shirt;

        return $this;
    }
    //endregion
}
