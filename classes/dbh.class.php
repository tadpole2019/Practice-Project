<?php

    class Dbh {
        private $db_host = "localhost";
        private $db_username = "admin";
        private $db_password = "111111";
        private $db_name = "member_system";

        protected function connect() {
            try {
                $dsn = 'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name;
                $pdo = new PDO($dsn, $this->db_username, $this->db_password);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                return $pdo;
            }
            catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
            
        }
    }

?>
