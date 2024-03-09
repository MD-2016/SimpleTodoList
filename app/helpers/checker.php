<?php

 class Checker {
    static function blankInput($topic, $task) {
        try {
            if(empty($topic) || empty($task)) {
                throw new Exception("Input must not be blank");
            }
        } catch(Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    static function stripHTML($topic, $task) {
       $filterTopic = htmlentities($topic, ENT_QUOTES | ENT_HTML5, "UTF-8");
       $filterTask = htmlentities($task, ENT_QUOTES | ENT_HTML5, "UTF-8");

       return array($filterTopic, $filterTask);
    }
 }