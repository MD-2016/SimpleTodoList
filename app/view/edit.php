<?php
    include_once("../controller/TodoController.php");
    include("../helpers/checker.php");
    ob_start();


    $tasks = new TodoController();
    $checker = new Checker();
    $task = $tasks->edit_Todo($_GET['id']);

?>
<?php include "../template/header.php"; ?>
<style>
    .card {
        margin: 20px 0;
    }

    .areatext {
        resize: none;
        width: 100%;
        height: 111px;
    }
    .back-btn{
        margin: 30px 0;
    }
</style>

<div class="container">
    <a href="index.php"><button class="btn btn-primary back-btn">Back</button></a>
    <div class="card-header">
        Update Task
    </div>
    <div class="card-body">
        <?php 
            if(isset($_POST['taskupdate'])) {
                $id = $_GET['id'];
                $topic = $_POST['updatetopic'];
                $task = $_POST['updatetask'];

                try {
                    if(is_string($topic) && is_string($task)) {
                        $fixedTopic = $checker->stripHTML($topic);
                        $fixedTask = $checker->stripHTML($task); 
                        $updatetask = new TodoController();
                        $updatetask->update_Todo($id, $fixedTopic, $fixedTask);

                        }
                    } catch(ErrorException $e) {
                        throw new ErrorException("Error processing input " . $e->getMessage());
                    } 
                }
        ?>

        <form action="" method="post">
            <label for="Topic">Topic : </label>
            <input type="text" name="updatetopic" value="<?= $task['topic'];?>" id="" class="form-control">
            <br>
            <label for="task">Task : </label>
            <textarea name="updatetask" class="form-control" id="" <?= $task['task'];?>></textarea>
            <br>
            <input type="submit" value="Update Task" name="taskupdate" class="btn btn-success">
        </form>
    </div>
</div>

<?php include("../template/footer.php");?>