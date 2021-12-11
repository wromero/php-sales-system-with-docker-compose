<?php

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
$basket2 = new Basket();
$basket2->addProductToBasket('R01');
$basket2->addProductToBasket('R01');

$basket2->addDeliveryChargeRule(
    new DeliveryChargeRule(0, 50.00, 4.95)
 );
$basket2->addDeliveryChargeRule(
new DeliveryChargeRule(50.01, 90.00, 2.95)
);
$basket2->addDeliveryChargeRule(
new DeliveryChargeRule(90.01, null, 0)
);

$basket2->addOffer(
new OffersSecondHalf('R01')
);
echo 'The Grand Total for Basket 2 is : $';
printf($basket2->getTotal());
echo '<br/>';
$basket3 = new Basket();
$basket3->addProductToBasket('G01');
$basket3->addProductToBasket('R01');

$basket3->addDeliveryChargeRule(
    new DeliveryChargeRule(0, 50.00, 4.95)
);
$basket3->addDeliveryChargeRule(
new DeliveryChargeRule(50.01, 90.00, 2.95)
);
$basket3->addDeliveryChargeRule(
new DeliveryChargeRule(90.01, null, 0)
);

$basket3->addOffer(
new OffersSecondHalf('R01')
);
echo 'The Grand Total for Basket 3 is : $';
printf($basket3->getTotal());
echo '<br/>';
$basket4 = new Basket();
$basket4->addProductToBasket('B01');
$basket4->addProductToBasket('B01');
$basket4->addProductToBasket('R01');
$basket4->addProductToBasket('R01');
$basket4->addProductToBasket('R01');

$basket4->addDeliveryChargeRule(
    new DeliveryChargeRule(0, 50.00, 4.95)
);
$basket4->addDeliveryChargeRule(
new DeliveryChargeRule(50.01, 90.00, 2.95)
);
$basket4->addDeliveryChargeRule(
new DeliveryChargeRule(90.01, null, 0)
);

$basket4->addOffer(
new OffersSecondHalf('R01')
);
echo 'The Grand Total for Basket 4 is : $';
printf($basket4->getTotal());
?>
