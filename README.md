# Simple and light docker-compose stack for Sales System

Only one cointainer: Apache and PHP 8  with the purpose to use for code challenge.


This is a very light stack and scalable.

**Description**

A company needs a POC for the new Sales System. They already have a list of products they offer: Red Widget, Blue Widget and Green Widget. They also have a list of Delivery Charge Rules that they apply depending on the amount spent. This sales system will also include an initial offer: buy one, get second half of the price.

**The solution**

In order to complete this code challenge, a top-down design has been used so that the Big Task has been split into many different and small tasks. A product includes the minimal properties required to operate. An item is considered the element of the Basket that handles the product details. The product catalogue is used to manage the list of products available for the Basket. The Basket itself is the main part of the solution. It includes all the functionality that needs to happen in order to perform all calculations necesary to complete the sale process. There are two utilities, one that is used to handle the delivery cost, and the second is used to handle the offers and discounts. 

**Assumptions and considerations**

The application has the following assumptions:

1. Discounts need to be applied before delivery charges are evaluated according to example
2. The list of products is preloaded in the constructor of the Basket for testing purposes.
3. Total amount is rounded to 2 decimal places.
4. There is an opportunity to improve while handling the offers or discounts so that it is more scalable.

The following is an example on how to use the application:

```
require_once './Basket.php';
require_once './Utilities/DeliveryChargeRule.php';
require_once './Utilities/OffersSecondHalf.php';

$basket1 = new Basket();
$basket1->addProductToBasket('B01');
$basket1->addProductToBasket('G01');


$basket1->addDeliveryChargeRule(
    new DeliveryChargeRule(0, 50.00, 4.95)
);
$basket1->addDeliveryChargeRule(
new DeliveryChargeRule(50.01, 90.00, 2.95)
);
$basket1->addDeliveryChargeRule(
new DeliveryChargeRule(90.01, null, 0)
);

$basket1->addOffer(
new OffersSecondHalf('R01')
);
echo 'The Grand Total for Basket 1 is : $';
printf($basket1->getTotal());
echo '<br/>';
```

## Requirements

You only need docker and docker-compose installed.

Install [docker](https://docs.docker.com/engine/installation/) and [docker-compose](https://docs.docker.com/compose/install/)

## Run

```
git clone https://github.com/wromero/php-sales-system-with-docker-compose.git
cd php-sales-system-with-docker-compose
docker-compose up
```

Now, you only have to visit http://localhost:8031 You can see the example of the four baskets and it shows the total for each basket. If you need to change the port number, you just need to modify it in the docker-compose.yml configuration file.

## Structure

```
├── php/src
│   ├── Entity
    │   ├── Item.php
    │   ├── Product.php
    │   ├── ProductCatalogue.php
│   ├── Utilities
    │   ├── DeliveryChargeRule.php
    │   ├── OffersSecondHalf.php
│   └── index.php 
│   ├── Basket.php 
├── docker-compose.yml
|── README.md
```