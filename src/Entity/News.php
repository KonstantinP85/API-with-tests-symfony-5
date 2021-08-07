<?php

namespace App\Entity;

use App\Repository\NewsRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"news:read"}},
 *     denormalizationContext={"groups"={"news:write"}}
 *     )
 * @ORM\Entity(repositoryClass=NewsRepository::class)
 */
class News
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"news:read"})
     */
    private int $id;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="news")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"category:read", "news:write"})
     */
    private ?Category $category;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"news:read", "news:write"})
     */
    private ?string $title;

    /**
     * @ORM\Column(type="string", length=1000)
     * @Groups({"news:read", "news:write"})
     */
    private ?string $content;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Category|null
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * @param Category|null $category
     * @return $this
     */
    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return $this
     */
    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }
}
