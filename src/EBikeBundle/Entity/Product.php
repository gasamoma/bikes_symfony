<?php

namespace EBikeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="EBikeBundle\Repository\ProductRepository")
 */
class Product
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
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column( type="string", length=100)
     */
    private $shortDesc;

    /**
     * @var string
     *
     * @ORM\Column( type="string", length=500)
     */
    private $fullDescription;

    /**
     * @var string
     *
     * @ORM\Column( type="string", length=50)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column( type="string", length=20)
     */
    private $deliverTime;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var float
     *
     * @ORM\Column( type="float")
     */
    private $score;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="products")
     * @ORM\JoinColumn(name="category_id_category", referencedColumnName="id")
     */
    private $categoryCategory;

    /**
     * @ORM\OneToMany(targetEntity="MediaHome", mappedBy="productProduct", cascade={"persist","remove"})
     */
    private $medias;

    /**
     * @ORM\OneToMany(targetEntity="Review", mappedBy="productProduct", cascade={"persist","remove"})
     */
    private $reviews;

    /**
     * @ORM\OneToOne(targetEntity="MediaHome")
     * @ORM\JoinColumn(name="media_home_id_media_home", referencedColumnName="id")
     */
    private $headingMedia;


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
     * @return Product
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

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->medias = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set categoryCategory
     *
     * @param \EBikeBundle\Entity\Category $categoryCategory
     *
     * @return Product
     */
    public function setCategoryCategory(\EBikeBundle\Entity\Category $categoryCategory = null)
    {
        $this->categoryCategory = $categoryCategory;

        return $this;
    }

    /**
     * Get categoryCategory
     *
     * @return \EBikeBundle\Entity\Category
     */
    public function getCategoryCategory()
    {
        return $this->categoryCategory;
    }

    /**
     * Add media
     *
     * @param \EBikeBundle\Entity\MediaHome $media
     *
     * @return Product
     */
    public function addMedia(\EBikeBundle\Entity\MediaHome $media)
    {
        $media->setProductProduct($this);
        $this->medias[] = $media;
        return $this;
    }

    /**
     * Remove media
     *
     * @param \EBikeBundle\Entity\MediaHome $media
     */
    public function removeMedia(\EBikeBundle\Entity\MediaHome $media)
    {
        $this->medias->removeElement($media);
    }

    /**
     * Get medias
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMedias()
    {
        return $this->medias;
    }

    /**
     * Set shortDesc
     *
     * @param string $shortDesc
     *
     * @return Product
     */
    public function setShortDesc($shortDesc)
    {
        $this->shortDesc = $shortDesc;

        return $this;
    }

    /**
     * Get shortDesc
     *
     * @return string
     */
    public function getShortDesc()
    {
        return $this->shortDesc;
    }

    /**
     * Set fullDescription
     *
     * @param string $fullDescription
     *
     * @return Product
     */
    public function setFullDescription($fullDescription)
    {
        $this->fullDescription = $fullDescription;

        return $this;
    }

    /**
     * Get fullDescription
     *
     * @return string
     */
    public function getFullDescription()
    {
        return $this->fullDescription;
    }

    /**
     * Set reference
     *
     * @param string $reference
     *
     * @return Product
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set deliverTime
     *
     * @param string $deliverTime
     *
     * @return Product
     */
    public function setDeliverTime($deliverTime)
    {
        $this->deliverTime = $deliverTime;

        return $this;
    }

    /**
     * Get deliverTime
     *
     * @return string
     */
    public function getDeliverTime()
    {
        return $this->deliverTime;
    }

    /**
     * Set score
     *
     * @param float $score
     *
     * @return Product
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return float
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set headingMedia
     *
     * @param \EBikeBundle\Entity\MediaHome $headingMedia
     *
     * @return Product
     */
    public function setHeadingMedia(\EBikeBundle\Entity\MediaHome $headingMedia = null)
    {
        $this->headingMedia = $headingMedia;

        return $this;
    }

    /**
     * Get headingMedia
     *
     * @return \EBikeBundle\Entity\MediaHome
     */
    public function getHeadingMedia()
    {
        return $this->headingMedia;
    }


    /**
     * Add review
     *
     * @param \EBikeBundle\Entity\Review $review
     *
     * @return Product
     */
    public function addReview(\EBikeBundle\Entity\Review $review)
    {
        $this->reviews[] = $review;

        return $this;
    }

    /**
     * Remove review
     *
     * @param \EBikeBundle\Entity\Review $review
     */
    public function removeReview(\EBikeBundle\Entity\Review $review)
    {
        $this->reviews->removeElement($review);
    }

    /**
     * Get reviews
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReviews()
    {
        return $this->reviews;
    }
}
