<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AdsRepository")
 */
class Ads
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=90)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=90, nullable=true)
     */
    private $slug;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $price;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $language;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $state;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_publish;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_expire;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Favorites", mappedBy="ad")
     */
    private $favorites;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Offers", mappedBy="ad")
     */
    private $offers;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users", inversedBy="ads")
     */
    private $createdBy;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categories", inversedBy="ads")
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Adresses", inversedBy="ads")
     */
    private $location;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Media", mappedBy="ads")
     */
    private $Attachments;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Attachements", mappedBy="ad")
     */
    private $attachements;

    public function __construct()
    {
        $this->favorites = new ArrayCollection();
        $this->offers = new ArrayCollection();
        $this->Attachments = new ArrayCollection();
        $this->attachements = new ArrayCollection();
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getDatePublish(): ?\DateTimeInterface
    {
        return $this->date_publish;
    }

    public function setDatePublish(\DateTimeInterface $date_publish): self
    {
        $this->date_publish = $date_publish;

        return $this;
    }

    public function getDateExpire(): ?\DateTimeInterface
    {
        return $this->date_expire;
    }

    public function setDateExpire(\DateTimeInterface $date_expire): self
    {
        $this->date_expire = $date_expire;

        return $this;
    }

    /**
     * @return Collection|Favorites[]
     */
    public function getFavorites(): Collection
    {
        return $this->favorites;
    }

    public function addFavorite(Favorites $favorite): self
    {
        if (!$this->favorites->contains($favorite)) {
            $this->favorites[] = $favorite;
            $favorite->setAd($this);
        }

        return $this;
    }

    public function removeFavorite(Favorites $favorite): self
    {
        if ($this->favorites->contains($favorite)) {
            $this->favorites->removeElement($favorite);
            // set the owning side to null (unless already changed)
            if ($favorite->getAd() === $this) {
                $favorite->setAd(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Offers[]
     */
    public function getOffers(): Collection
    {
        return $this->offers;
    }

    public function addOffer(Offers $offer): self
    {
        if (!$this->offers->contains($offer)) {
            $this->offers[] = $offer;
            $offer->setAd($this);
        }

        return $this;
    }

    public function removeOffer(Offers $offer): self
    {
        if ($this->offers->contains($offer)) {
            $this->offers->removeElement($offer);
            // set the owning side to null (unless already changed)
            if ($offer->getAd() === $this) {
                $offer->setAd(null);
            }
        }

        return $this;
    }

    public function getCreatedBy(): ?Users
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?Users $createdBy): self
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function getCategory(): ?Categories
    {
        return $this->category;
    }

    public function setCategory(?Categories $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getLocation(): ?Adresses
    {
        return $this->location;
    }

    public function setLocation(?Adresses $location): self
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return Collection|Media[]
     */
    public function getAttachments(): Collection
    {
        return $this->Attachments;
    }

    public function addAttachment(Media $attachment): self
    {
        if (!$this->Attachments->contains($attachment)) {
            $this->Attachments[] = $attachment;
            $attachment->setAds($this);
        }

        return $this;
    }

    public function removeAttachment(Media $attachment): self
    {
        if ($this->Attachments->contains($attachment)) {
            $this->Attachments->removeElement($attachment);
            // set the owning side to null (unless already changed)
            if ($attachment->getAds() === $this) {
                $attachment->setAds(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Attachements[]
     */
    public function getAttachements(): Collection
    {
        return $this->attachements;
    }

    public function addAttachement(Attachements $attachement): self
    {
        if (!$this->attachements->contains($attachement)) {
            $this->attachements[] = $attachement;
            $attachement->setAd($this);
        }

        return $this;
    }

    public function removeAttachement(Attachements $attachement): self
    {
        if ($this->attachements->contains($attachement)) {
            $this->attachements->removeElement($attachement);
            // set the owning side to null (unless already changed)
            if ($attachement->getAd() === $this) {
                $attachement->setAd(null);
            }
        }

        return $this;
    }
}
