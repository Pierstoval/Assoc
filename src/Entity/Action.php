<?php

namespace App\Entity;

use App\Repository\ActionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActionRepository::class)
 */
class Action
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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updtated_at;

    /**
     * @ORM\Column(type="text")
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $website;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $guest;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $featured_image;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="actions")
     */
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity=Blogpost::class, inversedBy="actions")
     */
    private $blogpost;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="action")
     */
    private $users;

    public function __construct()
    {
        $this->categorie = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdtatedAt(): ?\DateTimeInterface
    {
        return $this->updtated_at;
    }

    public function setUpdtatedAt(\DateTimeInterface $updtated_at): self
    {
        $this->updtated_at = $updtated_at;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getGuest(): ?string
    {
        return $this->guest;
    }

    public function setGuest(string $guest): self
    {
        $this->guest = $guest;

        return $this;
    }

    public function getFeaturedImage(): ?string
    {
        return $this->featured_image;
    }

    public function setFeaturedImage(string $featured_image): self
    {
        $this->featured_image = $featured_image;

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategorie(): Collection
    {
        return $this->categorie;
    }

    public function addCategorie(Category $categorie): self
    {
        if (!$this->categorie->contains($categorie)) {
            $this->categorie[] = $categorie;
        }

        return $this;
    }

    public function removeCategorie(Category $categorie): self
    {
        $this->categorie->removeElement($categorie);

        return $this;
    }

    public function getBlogpost(): ?Blogpost
    {
        return $this->blogpost;
    }

    public function setBlogpost(?Blogpost $blogpost): self
    {
        $this->blogpost = $blogpost;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addAction($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeAction($this);
        }

        return $this;
    }
}
