<?php 

  include "database_connection.php";

  $delete_id = $_POST['delete_item'];

  $sql = "DELETE FROM `books` WHERE `id` = '$delete_id'";

  if(mysqli_query($connection, $sql)){
    echo json_encode(array('statusCode' => 200));
  }else{
    echo json_encode(array('statusCode' => 201));
  }

  mysqli_close($connection);


?>