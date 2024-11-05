<?php

/*
+--------------+----------------+------------------+
| CustomerCode | CustomerDetail | CustomerDiscount |
+--------------+----------------+------------------+
*/
    // Create Class Customer
    // Make sure to have only similar attributes with the Customer table in the database
    class Customer {
    //Attributes
    private $CustomerCode;
    private $CustomerDetail;
    private $CustomerDiscount;

    //Getters
    function getCustomerCode(): string {
        return $this->CustomerCode;
    }

    function getCustomerDetail(): string {
        return $this->CustomerDetail;
    }

    function getCustomerDiscount(): float {
        return $this->CustomerDiscount;
    }

    }
?>