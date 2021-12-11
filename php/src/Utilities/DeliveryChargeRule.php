<?php

require_once __DIR__.'/../Basket.php';

/**
 * Class DeliveryChargeRule
 */
class DeliveryChargeRule
{
    /**
     * Minimum Value
     *
     * @var float
     */
    private $minValue;

    /**
     * Maximum value
     *
     * @var float
     */
    private $maxValue;

    /**
     * Delivery cost
     *
     * @var float
     */
    protected $deliveryCost;

    /**
     * DeliveryChargeRule constructor.
     * @param float $minValue
     * @param float|null $maxValue
     * @param float $deliveryCost
     */
    public function __construct(float $minValue, ?float $maxValue, float $deliveryCost)
    {
        $this->minValue = $minValue;
        $this->maxValue = $maxValue;
        $this->deliveryCost = $deliveryCost;
    }

    /**
     */
    public function matchRange(Basket $basket):bool
    {
        $subtotal = $basket->calculateSubTotal() - $basket->calculateTotalDiscount();
        if ($this->maxValue == null && $subtotal > $this->minValue) {
            return true;
        }
        if($subtotal > $this->minValue && $subtotal <= $this->maxValue){
            return true;
        }
        else {
            return false;
        }
    }

    /**
     */
    public function getDeliveryCost():float
    {
        return $this->deliveryCost;
    }
}