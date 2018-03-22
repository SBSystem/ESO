<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="users")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $username;
    /**
     * @ORM\Column(type="string", length=72)
     */
    private $password;
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $email;
    /**
     * @ORM\Column(type="boolean")
     */
    private $logged;
    /**
     * @ORM\Column(type="string", length=20)
     */
    private $role;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $code;
    /**
     * @ORM\Column(type="string", length=20)
     */
    private $name;
    /**
     * @ORM\Column(type="string", length=30)
     */
    private $surname;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $pesel;
	
    public function getId()
    {
        return $this->id;
    }
    public function getUsername(): string
    {
        return $this->username;
    }
    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }
    public function getLogged(): bool
    {
        return $this->logged;
    }
    public function setLogged(int $logged): self
    {
        $this->logged = $logged;
        return $this;
    }
    public function getRoles(): array
    {
        return [$this->role];
    }
    public function setRole(string $role): self
    {
        $this->role = $role;
        return $this;
    }
    public function getCode(): int
    {
        return $this->code;
    }
    public function setCode(?int $code): self
    {
        $this->code = $code;
        return $this;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }
    public function getSurname(): string
    {
        return $this->surname;
    }
    public function setSurname(string $surname): self
    {
        $this->surname = $surname;
        return $this;
    }
    public function getPesel(): int
    {
        return $this->pesel;
    }
    public function setPesel(?int $pesel): self
    {
        $this->pesel = $pesel;
        return $this;
    }
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            $this->email,
            $this->logged,
            $this->role,
            $this->code,
            $this->name,
            $this->surname,
            $this->pesel
        ));
    }
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            $this->email,
            $this->logged,
            $this->role,
            $this->code,
            $this->name,
            $this->surname,
            $this->pesel
        ) = unserialize($serialized);
    }
}
