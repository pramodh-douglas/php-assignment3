<?php
/*
+--------------+----------------+------------------+
| CustomerCode | CustomerDetail | CustomerDiscount |
+--------------+----------------+------------------+
*/
class CustomerDAO  {

    // Declare Static DB member to store the database
    private static $db;

    //Initialize the CustomerDAO
    static function initialize(string $className)    {
        //Remember to send in the class name for this DAO
        self::$db = new PDOService($className);
    }

    //Get all the Customer record
    static function getCustomer() {
        // SELECT statement
        $selectCustomers = "SELECT * FROM Customer;";

        // Prepare the Query
        self::$db->query($selectCustomers);
        // Perform the Query
        self::$db->execute();
        //Return the results
        return self::$db->resultSet();
    }
}


?>