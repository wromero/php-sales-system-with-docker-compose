<?php
require_once './Entity/Product.php';

/**
 * Class Item
 */
class Item
{
    /**
     * @var Product
     */
    private $product;

    /**
     *
     * @var int
     */
    private $quantity;

    /**
     * 
     * @param Product $product
     * @param int $quantity
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
        $this->quantity = 1;
    }

    /**
     * Get the product
     *
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * Get the quantity
     *
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * Set the quantity
     */
    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * Increment quantity by one
     *
     */
    public function incrementQuantity()
    {
        $this->quantity += 1;
    }
}