<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use /** @noinspection PhpUndefinedClassInspection */
    Doctrine\Common\Collections\ArrayCollection;
use /** @noinspection PhpUndefinedClassInspection */
    Doctrine\Common\Collections\Collection;



/**
 * @ORM\Table(name="Tag")
 * @ORM\Entity(repositoryClass="App\Repository\TagRepository")
 */
class Tag
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;
    /** @noinspection PhpUndefinedClassInspection */

    /**
     * @var Collection|Article[]
     * @ORM\ManyToMany(targetEntity="App\Entity\Article", inversedBy="tags")
     */
    private $articles;


    public function __construct()
    {
        /** @noinspection PhpUndefinedClassInspection */
        $this->articles = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Tag
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
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

    /** @noinspection PhpUndefinedClassInspection */
    /**
     * @return Collection|Article[]
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * @addArticle
     * @param Article $article
     * @return Tag
     */
    public function addArticle($article)
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
        }
        return $this;
    }

    /**
     * @removeArticle
     * @param Article $article
     * @return Tag
     */
    public function removeArticle($article)
    {
        if ($this->articles->contains($article)) {
            $this->articles->removeElement($article);
        }
        return $this;
    }
}
