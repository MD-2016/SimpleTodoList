<?php
namespace MD\config;
use MD\config\Config;
use PDOException;
use PDO;

    class Database {
        private static \PDO $pdo;

        public function connect() {
            if(empty(self::$pdo)) {
                try {
                    self::$pdo = new \PDO("sqlite:" . Config::DB_PATH);
                } catch(PDOException $e) {
                    echo "Error loading database: " . $e->getMessage();
                }
                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                return self::$pdo;
            }
        }
    }