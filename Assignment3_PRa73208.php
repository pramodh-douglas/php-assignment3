<?php
// Student Name : Pramodh Rajapakse
// Student No : 300373208

// Make sure to call all your include files
require_once('inc/config.inc.php');
require_once('inc/Entity/Page.class.php');
require_once('inc/Entity/Customer.class.php');
require_once('inc/Entity/Purchase.class.php');
require_once('inc/Utility/CustomerDAO.class.php');
require_once('inc/Utility/PurchaseDAO.class.php');
require_once('inc/Utility/PDOService.class.php');

PurchaseDAO::initialize("Purchase");

$purchases = PurchaseDAO::getPurchases();

// if the form was posted, validate the input and to update the valid status

//Show the header
Page::header();
Page::listPurchases($purchases);
Page::footer();

?>