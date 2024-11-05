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

        // ensures only two characters are in the customer code value
        $customerCode = substr($newPurchase->getCustomerCode(), 0, 2);
        $insertPurchase = "INSERT INTO Purchase(PurchaseID, CustomerCode, Amount)
                    VALUES(:PurchaseID, :CustomerCode, :Amount) ";
        self::$db->query($insertPurchase);
        self::$db->bind(':PurchaseID', $newPurchase->getPurchaseID());
        self::$db->bind(':CustomerCode', $customerCode);
        self::$db->bind(':Amount', $newPurchase->getAmount());
        return self::$db->execute();

    }

   // GET = READ = SELECT
    // This is for a single result.... when do I need it huh?
    static function getPurchase(string $PurchaseId)  {
        $selectQuery = "SELECT *
                        FROM Purchase
                        WHERE PurchaseID = :PurchaseID;";

        self::$db->query($selectQuery);
        self::$db->bind(':PurchaseID', $PurchaseId);
        self::$db->execute();
        return self::$db->singleResult();


    }

    // UPDATE means update
    static function updatePurchase (Purchase $PurchaseToUpdate) {
        $updateQuery = "UPDATE Purchase
                        SET CustomerCode = :CustomerCode,
                            Amount = :Amount
                        WHERE PurchaseID = :PurchaseID";

        self::$db->query($updateQuery);
        self::$db->bind(':PurchaseID', $PurchaseToUpdate->getPurchaseID());
        self::$db->bind(':CustomerCode', $PurchaseToUpdate->getCustomerCode());
        self::$db->bind(':Amount', $PurchaseToUpdate->getAmount());

        self::$db->execute();

    }

    // Sorry, I need to DELETE your record
    static function deletePurchase(string $PurchaseId) {
        $deleteQuery = "DELETE
                        FROM Purchase
                        WHERE PurchaseID = :PurchaseID;";

        self::$db->query($deleteQuery);
        self::$db->bind(':PurchaseID', $PurchaseId);
        self::$db->execute();

    }

    // WE NEED TO USE JOIN HERE
    // Make sure to select from both tables joined at the correct column
    // You may need to also query some columns from the Customer class/table.
    // Those columns are needed for price calculation and display the Customer detail in the main page
    static function getPurchaseList() {
        $selectAll = "SELECT Customer.*, Purchase.*
                      FROM Purchase
                      JOIN Customer ON Purchase.CustomerCode = Customer.CustomerCode;";

        self::$db->query($selectAll);
        self::$db->execute();
        return self::$db->resultSet();
    }

}


?>