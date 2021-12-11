<?php

require_once './Entity/Product.php';

/**
 * Class ProductCatalogue
 */
class ProductCatalogue
{
    /**
     *
     * @var array
     */
    private $products;

    /**
     * 
     */
    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }

    /**
     * 
     */
    public function findOneProductByCode(string $code): ?Product
    {
        foreach ($this->products as $product) {
            if ($product->getCode() === $code) {
                return $product;
            }
        }
        return null;
    }

}