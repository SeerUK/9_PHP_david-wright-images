<?php

namespace SeerUK\DWright\SecurityBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * SeerUK\Security\AccountBundle\Entity\User
 *
 * @ORM\Table(name="User")
 * @ORM\Entity(repositoryClass="SeerUK\DWright\SecurityBundle\Entity\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Column(name="intUserId", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $userId;

    /**
     * @ORM\Column(name="strUserName", type="string", length=25, unique=true)
     */
    private $userName;

    /**
     * @ORM\Column(name="strPassword", type="string", length=128)
     */
    private $password;

    /**
     * @inheritDoc
     */
    private $salt;

    /**
     * @ORM\Column(name="strEmail", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(name="bolActive", type="boolean")
     */
    private $isActive;

    public function __construct()
    {
        $this->salt = '';
    }

    /**
     * @inheritDoc
     */
    public function getUsername()
    {
        return $this->userName;
    }

    /**
     * @inheritDoc
     */
    public function setUsername($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @inheritDoc
     */
    public function getEmail()
    {
        return $this->userName;
    }

    /**
     * @inheritDoc
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @inheritcDoc
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @inheritDoc
     */
    public function getIsActive()
    {
        return $this->password;
    }

    /**
     * @inheritcDoc
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return array('ROLE_USER', 'ROLE_ADMIN');
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
    }

    /**
     * @inheritDoc
     */
    public function equals(UserInterface $user)
    {
        return $this->userName === $user->getUsername();
    }
}
