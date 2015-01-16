<?php

namespace Vtes\Bundle\WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="search_idx", columns={"username"})})
 * @ORM\Entity
 * @UniqueEntity("username")
 */
class User implements UserInterface
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
     * @ORM\Column(name="password", type="string", length=64)
     */
    private $password;

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
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
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
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);

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

    //region interface implementation
    public function eraseCredentials()
    {
        // not being used
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function getSalt()
    {
        return null; // not required, password_hash does that for us
    }
    //endregion
}
