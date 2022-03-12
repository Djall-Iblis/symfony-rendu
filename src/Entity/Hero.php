<?php

namespace App\Entity;

use App\Repository\HeroRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HeroRepository::class)]
class Hero
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $level;

    #[ORM\ManyToOne(targetEntity: CoreClass::class, inversedBy: 'heroes')]
    private $class;

    #[ORM\ManyToOne(targetEntity: Ancestry::class, inversedBy: 'heroes')]
    private $ancestry;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(string $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getClass(): ?CoreClass
    {
        return $this->class;
    }

    public function setClass(?CoreClass $class): self
    {
        $this->class = $class;

        return $this;
    }

    public function getAncestry(): ?Ancestry
    {
        return $this->ancestry;
    }

    public function setAncestry(?Ancestry $ancestry): self
    {
        $this->ancestry = $ancestry;

        return $this;
    }
}
