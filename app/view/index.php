<?php
   include_once("../controller/TodoController.php");
   include("../helpers/checker.php");

   $todos = new TodoController();
   $checker = new Checker();
?>
<?php include "../template/header.php"; ?>
<style>
    .card {
        margin: 20px 0;
    }
    .areatext {
        resize: none;
        width: 100%;
        height: 110px;
    }
</style>

<div class="container">
    <div class="card">
        <div class="card-header">Add Todo</div>
        <div class="card-body">
            <?php 
                if(isset($_POST['add_todo'])) {
                    $topic = $_POST['topic'];
                    $task = $_POST['task'];

                    try {
                        if(is_string($topic) && is_string($task)) {
                            $fixedTopic = $checker->stripHTML($topic);
                            $fixedTask = $checker->stripHTML($task); 
                            $addTodo = new TodoController();
                            $addTodo->add_Todo($fixedTopic,$fixedTask);

                        }
                    } catch(ErrorException) {
                       throw new ErrorException("Error processing input");
                    }
                }
            ?>

            <form action="" method="POST">
                <label for="topic">Topic :</label>
                <input type="text" name="topic" id="" class="form-control" required><br>

                <label for="task">Todo :</label>
                <textarea name="task" id="" class="form-control areatext" required></textarea><br>

                <input type="submit" value="Add Todo" name="add_todo" class="btn btn-success">
            </form>
        </div>
    </div>

    <hr>

    <h2 class="text-center">All Todos</h2>

    <?php 
        if(isset($_POST['delete_todo'])) {
            $id = $_POST['delete_id'];

            $deleteTodo = new TodoController();
            $deleteTodo->delete_Todo($id);
        }
    ?>

    <ol class="list-group list-group">
        <?php 
            $todoList = new TodoController();
            $viewAllTodos = $todoList->viewTodos();

            foreach($viewAllTodos as $todoItem) {
        ?>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold"><?= $todoItem['topic'];?></div>
                <?= $todoItem['task'];?>
            </div>
            <a href="edit.php?id=<?= $todoItem['id']; ?>"><button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button></a> &nbsp;
            <form action="" method="POST"><input type="hidden" name="delete_id" value="<?= $todoItem['id']; ?>"><button type="submit" name="delete_todo" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete </button></form>
            &nbsp;<span class="badge bg-primary rounded-pill"><?= $todoItem['add_date']; ?></span>
        </li>
        <?php } ?>
    </ol>
</div>
<?php include "../template/footer.php";?>