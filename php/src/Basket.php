<?php

require_once './Entity/ProductCatalogue.php';
require_once './Entity/Item.php';
require_once './Entity/Product.php';
require_once './Utilities/DeliveryChargeRule.php';
require_once './Utilities/OffersSecondHalf.php';
/**
 * Class Basket
 */
class Basket
{
    private $items = [];
    
    private $productCatalogue;

    private $deliveryChargeRules = [];

    private $offers = [];

    public function __construct()
    {
        $this->productCatalogue = new ProductCatalogue();
        $this->productCatalogue->addProduct(new Product('R01', 'Red Widget', 32.95));
        $this->productCatalogue->addProduct(new Product('G01', 'Green Widget', 24.95));
        $this->productCatalogue->addProduct(new Product('B01', 'Blue Widget', 7.95));
    }

    public function calculateSubTotal(): float
    {
        $subtotal = 0;
        foreach ($this->items as $item) {
            $subtotal += $item->getQuantity() * $item->getProduct()->getPrice();
        }

        return $subtotal;
    }

    /**
     * Add product to the basket
     *
     * @param string $code
     * @return bool
     */
    public function addProductToBasket(string $code):bool
    {
        $product = $this->productCatalogue->findOneProductByCode($code);

        foreach ($this->items as $key => $item) {
            if ($item->getProduct()->getCode() === $product->getCode()) {
                $item->incrementQuantity();
                $this->items[$key] = $item;
                return true;
            }
        }

        $this->items[] = new Item($product);

        return true;
    }

     /**
     * Get the products catalogue
     *
     * @return ProductCatalogue
     */
    public function getProductsCatalogue():ProductCatalogue
    {
        return $this->productCatalogue;
    }

    public function getBasketItems(): array
    {
        return $this->items;
    }

    public function addDeliveryChargeRule(DeliveryChargeRule $deliveryChargeRule)
    {
        $this->deliveryChargeRules[] = $deliveryChargeRule;
    }

    public function calculateDeliveryTotalCost():float
    {
        foreach ($this->deliveryChargeRules as $deliveryChargeRule) {
            if ($deliveryChargeRule->matchRange($this)) {
                return $deliveryChargeRule->getDeliveryCost();
            }
        }

        return 0;
    }

    public function addOffer(OffersSecondHalf $offer)
    {
       $this->offers[] = $offer;
    }

    public function calculateTotalDiscount(): float
    {
        $discounts = 0;
        foreach ($this->offers as $offer) {
            $discount = $offer->getDiscount($this);
            $discounts += $discount;
        }

        return $discounts;
    }

    public function getTotal()
    {
        return $this->calculateSubTotal() + $this->calculateDeliveryTotalCost() - $this->calculateTotalDiscount();
    }

}
?>