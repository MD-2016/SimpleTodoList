<?php


    class Database {
            private $pdo;
        public function connect() {
            
            /*
            if(empty(self::$pdo)) {
                try {
                    self::$pdo = new PDO("sqlite:" . Config::DB_PATH);
                } catch(PDOException $e) {
                    echo "Error loading database: " . $e->getMessage();
                }
                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                return self::$pdo;*/

                if($this->pdo == null) {
                    $this->pdo = new PDO("sqlite:../database/todoDB.sqlite3");
                }

                return $this->pdo;
            }
        }