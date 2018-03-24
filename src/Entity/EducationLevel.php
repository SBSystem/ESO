<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EducationLevelRepository")
 * @ORM\Table(name="classes")
 */
class EducationLevel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $ClassName;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $ClassLevel;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $EducatorId;

    public function getId()
    {
        return $this->id;
    }

    public function getClassName(): string
    {
        return $this->ClassName;
    }

    public function setClassName(string $ClassName): self
    {
        $this->ClassName = $ClassName;

        return $this;
    }

    public function getClassLevel(): string
    {
        return $this->ClassLevel;
    }

    public function setClassLevel(string $ClassLevel): self
    {
        $this->ClassLevel = $ClassLevel;

        return $this;
    }

    public function getEducatorId(): int
    {
        return $this->EducatorId;
    }

    public function setEducatorId(int $EducatorId): self
    {
        $this->EducatorId = $EducatorId;

        return $this;
    }
}
