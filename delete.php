<?php 
require_once('db.php');
$id = $_GET['id'];

$sql = "DELETE FROM task WHERE id = $id";
$execute = mysqli_query($connection, $sql);
if($execute){
    header('location:todo.php');
}
?>