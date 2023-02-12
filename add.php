<?php
  include 'database_connection.php';


  $add_title = $_POST['add_title'];
  $add_author = $_POST['add_author'];
  $add_date = $_POST['add_date'];
  $add_publisher = $_POST['add_publisher'];
  $add_genre = $_POST['add_genre'];

  $sql = "INSERT INTO `books`
    (
      `title`,
      `author`, 
      `date`, 
      `publisher`,
      `genre`
    ) 
  VALUES 
    (
    '$add_title',
    '$add_author',
    '$add_date',
    '$add_publisher',
    '$add_genre'
    )
    ";

  if(mysqli_query($connection, $sql)){
    echo json_encode(array('statusCode' => 200));
  }else{
    echo json_encode(array('statusCode' => 201));
  }

  mysqli_close($connection);

?>