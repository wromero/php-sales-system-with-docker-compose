<?php


/**
 * Class Product
 * 
 */
class Product
{
    /**
     * Product Code
     *
     * @var string
     */
    private $code;

    /**
     * Product Name
     *
     * @var string
     */
    private $name;


    /**
     * Product price
     *
     * @var Price
     */
    private $price;

    /**
     * Product constructor.
     * @param string $code
     * @param string $name
     * @param float $price
     */
    public function __construct(string $code, string $name, float $price)
    {
        $this->code = $code;
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * Get the code
     *
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * Set the code
     *
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * Get the name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the name
     *
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }


    /**
     * Get the price
     *
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * Set the price
     *
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
}