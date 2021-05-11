<?php
    require('db.php');
//insertion to the database

$error = 'Fill all Fields!!!';
if($_SERVER['REQUEST_METHOD']=='POST' AND isset($_POST['time'])){
    $task = $_POST['task'];
    $time = $_POST['time'];
// print_r($task); die;
    if(empty($task) || empty($time)){
        echo "<script>alert('error')</script>";
        header('location:todo.php?error=1');
    }else{
   $chinoye = "INSERT INTO task(task, time) VALUES('$task', '$time')"; 
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
$sql = "SELECT * FROM task";
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
                                    <input type="task" class="form-control" id="task" name="task">
                                </div>
                                <div class="form-group">
                                    <label for="time">Time:</label>
                                    <input type="date" class="form-control" id="time" name="time">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success float-right">Submit</button>
                            </div>
                        </div>
                    </form>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="col-md-12">
            <table class="table table-hover table-striped">
                <thead class="thead-dark">
                    <th>ID</th>
                    <th>TASK</th>
                    <th>TIME</th>
                    <th>Created_At</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php 
                    $x = 1;
                    foreach($record as $data){ ?>
                    <tr>
                        <td><?=$x++;?></td>
                        <td><?=$data['task']?></td>
                        <td><?=$data['time']?></td>
                        <td><?=$data['created_at']?></td>
                        <td>
                            <a href="edit.php?ID=<?=$data['ID']?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="delete.php?id=<?=$data['ID']?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>