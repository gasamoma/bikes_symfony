<?php

namespace EBikeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PurchaseOrder
 *
 * @ORM\Table(name="purchase_order")
 * @ORM\Entity(repositoryClass="EBikeBundle\Repository\PurchaseOrderRepository")
 */
class PurchaseOrder
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
     * @ORM\Column(name="productProduct", type="string", length=255)
     */
    private $productProduct;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255)
     */
    private $value;

    /**
     * @var float
     *
     * @ORM\Column(name="tax", type="float")
     */
    private $tax;

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="categoryCategory")
     */
    private $products;


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
     * Set productProduct
     *
     * @param string $productProduct
     *
     * @return PurchaseOrder
     */
    public function setProductProduct($productProduct)
    {
        $this->productProduct = $productProduct;

        return $this;
    }

    /**
     * Get productProduct
     *
     * @return string
     */
    public function getProductProduct()
    {
        return $this->productProduct;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return PurchaseOrder
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set tax
     *
     * @param float $tax
     *
     * @return PurchaseOrder
     */
    public function setTax($tax)
    {
        $this->tax = $tax;

        return $this;
    }

    /**
     * Get tax
     *
     * @return float
     */
    public function getTax()
    {
        return $this->tax;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add product
     *
     * @param \EBikeBundle\Entity\Product $product
     *
     * @return PurchaseOrder
     */
    public function addProduct(\EBikeBundle\Entity\Product $product)
    {
        $this->products[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \EBikeBundle\Entity\Product $product
     */
    public function removeProduct(\EBikeBundle\Entity\Product $product)
    {
        $this->products->removeElement($product);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducts()
    {
        return $this->products;
    }
}
