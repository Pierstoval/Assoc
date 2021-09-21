<?php

namespace App\Entity;

use App\Repository\ActionRepository;
use DateTimeInterface;
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
     * @ORM\OneToMany(targetEntity=Blogpost::class, mappedBy="actions")
     */
    private $mentionedByBlogposts;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="createdActions")
     */
    private $creators;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class)
     */
    private $categories;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="action")
     */
    private $comments;

    public function __construct()
    {
        $this->categorie = new ArrayCollection();
        $this->creators = new ArrayCollection();
        $this->mentionedByBlogposts = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->comments = new ArrayCollection();
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

    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdtatedAt(): ?DateTimeInterface
    {
        return $this->updtated_at;
    }

    public function setUpdtatedAt(DateTimeInterface $updtated_at): self
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

    public function getMentionedByBlogposts(): ArrayCollection
    {
        return $this->mentionedByBlogposts;
    }

    public function setMentionedByBlogposts(ArrayCollection $blogposts): self
    {
        $this->mentionedByBlogposts = $blogposts;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getCreators(): Collection
    {
        return $this->creators;
    }

    public function addUser(User $user): self
    {
        if (!$this->creators->contains($user)) {
            $this->creators[] = $user;
            $user->addAction($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->creators->removeElement($user)) {
            $user->removeAction($this);
        }

        return $this;
    }

    public function addBlogpost(Blogpost $blogpost): self
    {
        if (!$this->mentionedByBlogposts->contains($blogpost)) {
            $this->mentionedByBlogposts[] = $blogpost;
            $blogpost->setAction($this);
        }

        return $this;
    }

    public function removeBlogpost(Blogpost $blogpost): self
    {
        if ($this->mentionedByBlogposts->removeElement($blogpost)) {
            // set the owning side to null (unless already changed)
            if ($blogpost->getAction() === $this) {
                $blogpost->setAction(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setAction($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getAction() === $this) {
                $comment->setAction(null);
            }
        }

        return $this;
    }
}
