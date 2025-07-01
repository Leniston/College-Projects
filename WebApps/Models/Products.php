<?php

class Products {
    // db connect
    private $connection;
    private $table = "products";

    // constructor with db connection
    public function __construct($db) {
        $this->connection = $db;
    }

        //get non-member books
        public function getRegularBooks() {
            $sql = " SELECT * FROM " . $this->table . " WHERE member_only = 0";

            $statement = $this->connection->prepare($sql);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        //get member book
        public function getMemberBooks() {
            $sql =" SELECT * FROM " . $this->table . " WHERE member_only =1 ";
            $statement = $this->connection->prepare($sql);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

}
?>