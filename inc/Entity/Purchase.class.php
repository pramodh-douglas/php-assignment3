<?php

/*
+------------+--------------+--------+
| PurchaseID | CustomerCode | Amount |
+------------+--------------+--------+
*/
// Create Purchase Class

    // We need all columns 

    // Attributes, make sure they match the column names!    

    //Setters. Why do we need setters in this class?
    
    class Purchase {

    private $PurchaseID;
    private $CustomerCode;
    private $Amount;


    //Getters
    function getPurchaseID(): string
    {
        return $this->PurchaseID;
    }

    function getCustomerCode(): string
    {
        return $this->CustomerCode;
    }

    function getAmount(): string
    {
        return $this->Amount;
    }

    //Setters
    function setPurchaseID(float $newPurchaseID)
    {
        $this->PurchaseID = $newPurchaseID;
    }

    function setCustomerCode(string $newCustomerCode)
    {
        $this->CustomerCode = $newCustomerCode;
    }
    
    }

?>