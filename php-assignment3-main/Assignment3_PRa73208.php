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
CustomerDAO::initialize("Customer");

if (!empty($_GET))  {
  if ($_GET["action"] == "delete")    {
      PurchaseDAO::deletePurchase($_GET["purchaseID"]);
      $_GET = [];
  }
}

if (!empty($_POST)) {
  if($_POST["action"] == "edit") {
       //Assemble the book
       $editPurchase = new Purchase();
       $editPurchase->setPurchaseID($_POST['purchaseID']);
       $editPurchase->setCustomerCode($_POST['customerCode']);
       $editPurchase->setAmount($_POST['amount']);

       //Add the purchase to the database
       PurchaseDAO::updatePurchase($editPurchase);
  } else {
    //Assemble the book
    $newPurchase = new Purchase();
    $newPurchase->setPurchaseID($_POST['purchaseID']);
    $newPurchase->setCustomerCode($_POST['customerCode']);
    $newPurchase->setAmount($_POST['amount']);

    //Add the purchase to the database
    PurchaseDAO::createPurchase($newPurchase);
  }
  $_POST = [];
}

$purchases = PurchaseDAO::getPurchaseList();
$customers = CustomerDAO::getCustomer();


//Show the header
Page::header();
Page::listPurchases($purchases);
if (!empty($_GET))  {
  if ($_GET["action"] == "edit")    {
    $purchaseObj = PurchaseDAO::getPurchase($_GET["purchaseID"]);
    Page::editPurchaseForm($purchaseObj, $customers);
  } else {
    Page::createPurchaseForm($customers);
  }
  $_GET = [];
} else {
  Page::createPurchaseForm($customers);
}
Page::footer();

?>