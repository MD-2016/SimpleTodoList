<?php
namespace MD\controller;
use MD\model\TodoModel;

class TodoController extends TodoModel {
    public function viewTodos() {
        return $this->selectAllTodos();
    }

    public function add_Todo($todo, $data) {
        return $this->addTodo($todo, $data);
    }

    public function edit_Todo($id) {
        return $this->editTodo($id);
    }

    public function update_Todo($id, $topic, $task) {
        return $this->updateTodo($id, $topic, $task);
    }

    public function delete_Todo($id) {
        return $this->deleteTodo($id);
    }
}

