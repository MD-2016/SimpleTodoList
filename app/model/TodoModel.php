<?php
include("../config/db.php");

    class TodoModel extends Database {
        public function addTodo($todo, $data) {
            $date = date('y-m-d H-m-sa');
            $done = 0;

            $sql = "INSERT INTO `todo`(`topic`, `task`, `is_done`, `add_date`)VALUES(?,?,?,?)";
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute([$todo, $data, $done, $date]);
        }

        public function selectAllTodos() {
            $sql = "SELECT * FROM `todo`";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();

            return $results;
        }

        public function editTodo($id) {
            $sql = "SELECT * FROM `todo` WHERE id=?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);

            $result = $stmt->fetch();
            return $result;
        }

        public function updateTodo($id, $topic, $data) {
            $sql = "UPDATE `todo` SET topic = ?, task = ?, WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $result = $stmt->execute([$topic, $data, $id]);

            header("location:index.php");
            return $result;
        }

        public function deleteTodo($id) {
            $sql = "DELETE FROM `todo` WHERE id=?";
            $stmt = $this->connect()->prepare($sql);
            $result = $stmt->execute([$id]);

            return $result;
        }
    }