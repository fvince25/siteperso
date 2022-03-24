<?php

namespace App\Entity;

use App\Repository\CategorySkillRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorySkillRepository::class)
 */
class CategorySkill
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
    private $label;

    /**
     * @ORM\OneToMany(targetEntity=Skill::class, mappedBy="categorySkill")
     */
    private $skills;

    /**
     * @ORM\Column(type="smallint")
     */
    private $ordre;

    public function __construct()
    {
        $this->skills = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return Collection<int, Skill>
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    public function addSkill(Skill $skill): self
    {
        if (!$this->skills->contains($skill)) {
            $this->skills[] = $skill;
            $skill->setCategorySkill($this);
        }

        return $this;
    }

    public function removeSkill(Skill $skill): self
    {
        if ($this->skills->removeElement($skill)) {
            // set the owning side to null (unless already changed)
            if ($skill->getCategorySkill() === $this) {
                $skill->setCategorySkill(null);
            }
        }

        return $this;
    }

    public function getOrdre(): ?int
    {
        return $this->ordre;
    }

    public function setOrdre(int $ordre): self
    {
        $this->ordre = $ordre;

        return $this;
    }
}
