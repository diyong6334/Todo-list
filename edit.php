<?php
    require('db.php');
//insertion to the database
$id = $_GET['ID'];
$error = 'Fill all Fields!!!';
if($_SERVER['REQUEST_METHOD']=='POST' AND isset($_POST['time'])){
    $task = $_POST['task'];
    $time = $_POST['time'];

    if(empty($task) || empty($time)){
        echo "<script>alert('error')</script>";
        header('location:edit.php?error=1');
    }else{
     $chinoye = "UPDATE task SET task ='$task', time ='$time' WHERE ID = $id"; 
    $result = mysqli_query($connection, $chinoye);
    if($result){
        echo "<script>alert('record Inserted Successfully')</script>";
        header('location:todo.php');
    }else{
        echo "<script>alert('unable to Insert Record')</script>";
    }
    }
}
//fetching record from the database
$sql = "SELECT * FROM task WHERE ID = $id";
$result = mysqli_query($connection, $sql);
$record = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<?php require_once('script.php');?>
<body>
<!-- &lt;b&gt;  -->
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header bg-danger">
                      <h1 class="text-center text-white display-5 ">
                          <span class="badge badge-danger text-white">
                                 TODO APPLICATION
                          </span>
                      </h1>  
                    </div>
                    <form role="form" method="post" action="">
                        <div class="card">
                            <div class="card-body">
                                <?php if(isset($_GET['error'])){?>
                                    <div class="alert alert-danger">
                                        <?=$error;?>
                                    </div>
                                 <?php } ?>
                                <div class="form-group">
                                    <label for="task">Task:</label>
                                    <input type="task" class="form-control" id="task" name="task" value="<?=$record[0]['task'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="time">Time:</label>
                                    <input type="text" class="form-control" id="time" name="time" value="<?=$record[0]['time'];?>">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-danger float-right">Update</button>
                            </div>
                        </div>
                    </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>