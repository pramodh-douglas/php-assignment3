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

    function getCustomerCodeString() : string
    {
        $customerCodeString = "";
        switch($this->CustomerCode) {
            case 'ST':
                $customerCodeString = "Student";
                break;
            case 'SE':
                $customerCodeString = "Senior";
                break;
            case 'RE':
                $customerCodeString = "Regular";
                break;
            default:
                $customerCodeString = "";
                break;
        }
        return $customerCodeString;
    }

    function getAmount(): string
    {
        return $this->Amount;
    }

    //Setters
    function setPurchaseID(string $newPurchaseID)
    {
        $this->PurchaseID = $newPurchaseID;
    }

    function setCustomerCode(string $newCustomerCode)
    {
        $this->CustomerCode = $newCustomerCode;
    }

    function setAmount(int $newAmount)
    {
        $this->Amount = $newAmount;
    }

    }

?>