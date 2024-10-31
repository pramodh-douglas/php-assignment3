<?php


/*
+------------+--------------+--------+
| PurchaseID | CustomerCode | Amount |
+------------+--------------+--------+
*/

class PurchaseDAO  {

    // Declare Static DB member to store the database 
    private static $db;   

    static function initialize(string $className)    {
        //Remember to send in the class name for this DAO
        self::$db = new PDOService($className);
    }

    // One of the functionality for the class abstracted by this DAO: CREATE
    // Remember that Create means INSERT    
    static function createPurchase(Purchase $newPurchase) {

        // QUERY BIND EXECUTE 
        // You may want to return the last inserted id

    }
    
   // GET = READ = SELECT
    // This is for a single result.... when do I need it huh?     
    static function getPurchase(string $PurchaseId)  {
        //QUERY, BIND, EXECUTE, RETURN (the single result)

    }

    // GET = READ = SELECT ALLL
    // This is to get all purchases, do I even need this function?     
    static function getPurchases() : Array {
        $selectAll = "SELECT * FROM purchase;";

        self::$db->query($selectAll);
        self::$db->execute();
        return self::$db->resultSet();
    }
    
    // UPDATE means update   
    static function updatePurchase (Purchase $PurchaseToUpdate) {

        // QUERY, BIND, EXECUTE
        // You may want to return the rowCount

    }
    
    // Sorry, I need to DELETE your record 
    static function deletePurchase(string $PurchaseId) {

        // Yea...yea... it is a drill like the one before


    }

    // WE NEED TO USE JOIN HERE
    // Make sure to select from both tables joined at the correct column
    // You may need to also query some columns from the Customer class/table. 
    // Those columns are needed for price calculation and display the Customer detail in the main page    
    static function getPurchaseList() {
        
    }

}


?>