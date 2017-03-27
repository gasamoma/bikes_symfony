<?php

namespace EBikeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PromImg
 *
 * @ORM\Table(name="prom_img")
 * @ORM\Entity(repositoryClass="EBikeBundle\Repository\PromImgRepository")
 */
class PromImg
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
     * @ORM\Column(name="name", type="string", length=20)
     */
    private $name;

    /**
     * @ORM\OneToOne(targetEntity="MediaHome")
     * @ORM\JoinColumn(name="media_home_id_media_home", referencedColumnName="id")
     */
    private $image;


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
     * @return PromImg
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
     * Set image
     *
     * @param \EBikeBundle\Entity\MediaHome $image
     *
     * @return PromImg
     */
    public function setImage(\EBikeBundle\Entity\MediaHome $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \EBikeBundle\Entity\MediaHome
     */
    public function getImage()
    {
        return $this->image;
    }
}
