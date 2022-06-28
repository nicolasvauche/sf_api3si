<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PostRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: PostRepository::class)]
#[ApiResource(
    collectionOperations: [
        "get" => [
            'normalization_context' => ['groups' => 'post:read'],
            'security' => 'is_granted("ROLE_USER")',
            'security_message' => "Vous n'avez pas les droits suffisants pour faire cela"
        ],

        "post" => [
            'normalization_context' => ['groups' => 'post:write'],
            'security' => 'is_granted("ROLE_USER")',
            'security_message' => "Vous n'avez pas les droits suffisants pour faire cela"
        ],

    ],
    itemOperations: [
        "get" => [
            'normalization_context' => ['groups' => 'post:read'],
            'security' => 'is_granted("ROLE_USER")',
            'security_message' => "Vous n'avez pas les droits suffisants pour faire cela"
        ],
        "put" => [
            'normalization_context' => ['groups' => 'post:write'],
            'security' => 'is_granted("ROLE_ADMIN") or object.owner == user',
            'security_message' => "Vous n'avez pas les droits suffisants pour faire cela"
        ],
        "patch" => [
            'normalization_context' => ['groups' => 'post:write'],
            'security' => 'is_granted("ROLE_ADMIN") or object.owner == user',
            'security_message' => "Vous n'avez pas les droits suffisants pour faire cela"
        ],
        "delete" => [
            'normalization_context' => ['groups' => 'post:delete'],
            'security' => 'is_granted("ROLE_ADMIN") or object.owner == user',
            'security_message' => "Vous n'avez pas les droits suffisants pour faire cela"
        ],

    ],
    attributes: ["security" => "is_granted('ROLE_USER')"],
)]
class Post
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['post:read'])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['post:read', 'post:write'])]
    private $title;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['post:read', 'post:write'])]
    private $slug;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['post:read', 'post:write'])]
    private $media;

    #[ORM\Column(type: 'text', nullable: true)]
    #[Groups(['post:read', 'post:write'])]
    private $content;

    #[ORM\Column(type: 'boolean')]
    #[Groups(['post:read', 'post:write'])]
    private $online;

    #[ORM\Column(type: 'datetime_immutable')]
    #[Groups(['post:read', 'post:write'])]
    private $createdAt;

    #[ORM\Column(type: 'datetime_immutable')]
    #[Groups(['post:read', 'post:write'])]
    private $updatedAt;

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getMedia(): ?string
    {
        return $this->media;
    }

    public function setMedia(?string $media): self
    {
        $this->media = $media;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function isOnline(): ?bool
    {
        return $this->online;
    }

    public function setOnline(bool $online): self
    {
        $this->online = $online;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
