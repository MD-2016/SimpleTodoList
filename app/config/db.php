<?php


    class Database {
            private $pdo;
        public function connect() {
            
            /*
            if(empty(self::$pdo)) {
                try {
                    self::$pdo = new PDO("sqlite:" . Config::D
                } cat
                    echo "Error loading database: " . $e->getMessage();
                }
                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                return self::$pdo;*/

                if($this->pdo == null) {
                    $this->pdo = new PDO("sqlite:../database/todoDB.sqlite3");
                    $table = "CREATE TABLE `todo` (`id` INTEGER PRIMARY KEY AUTOINCREMENT, `topic` TEXT NOT NULL, `task` TEXT NOT NULL, `is_done` BOOLEAN, `add_date` DATETIME";
                    $run = $this->pdo->prepare($table);
                    $run->execute();
                    return $this->pdo;
            }
        }
    }
