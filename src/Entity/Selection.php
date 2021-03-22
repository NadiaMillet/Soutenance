<?php

namespace App\Entity;

use App\Repository\SelectionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SelectionRepository::class)
 */
class Selection
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $img1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $img2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $img3;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getImg1()
    {
        return $this->img1;
    }

    public function setImg1($img1)
    {
        $this->img1 = $img1;

        return $this;
    }

    public function getImg2()
    {
        return $this->img2;
    }

    public function setImg2($img2)
    {
        $this->img2 = $img2;

        return $this;
    }

    public function getImg3()
    {
        return $this->img3;
    }

    public function setImg3($img3)
    {
        $this->img3 = $img3;

        return $this;
    }

}
