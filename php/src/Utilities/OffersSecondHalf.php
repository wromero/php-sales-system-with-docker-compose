<?php

require_once __DIR__.'/../Basket.php';

/**
 * Class OffersSecondHalf
 */
class OffersSecondHalf
{
    /**
     *
     * @var string
     */
    private $productCode;

    /**
     * @param string $productCode
     */
    public function __construct(string $productCode)
    {
        $this->productCode = $productCode;
    }


    /**
     */
    public function getDiscount(Basket $basket): float
    {
        foreach ($basket->getBasketItems() as $item) {
            if ($this->productCode === $item->getProduct()->getCode() && $item->getQuantity() >= 2) {
                return round((floor($item->getQuantity() / 2) * ($item->getProduct()->getPrice() / 2)),2);
            }
        }

        return 0;
    }
}