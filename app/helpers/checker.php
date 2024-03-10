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

    static function stripHTML($textToBeStripped) {
        $fixedText = htmlentities($textToBeStripped, ENT_QUOTES | ENT_HTML5, "UTF-8");

        return $fixedText;
    }
 }