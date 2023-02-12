<?php
  include "database_connection.php";

  $sql = "SELECT * FROM `books`";
  $result = mysqli_query($connection, $sql);

  if($result->num_rows > 0){
    while($row = mysqli_fetch_assoc($result)){
?>

  <tr>
    <td><?php echo $row['title']; ?></td>
    <td><?php echo $row['author']; ?></td>
    <td><?php echo $row['date']; ?></td>
    <td><?php echo $row['publisher']; ?></td>
    <td><?php echo $row['genre']; ?></td>
    <td>
      <button class='btn btn-primary' 
        data-bs-toggle='modal' 
        data-bs-target='#view_modal' 
        data-id='<?php echo $row['id']; ?>' 
        data-title='<?php echo $row['title']; ?>' 
        data-author='<?php echo $row['author']; ?>' 
        data-date='<?php echo $row['date']; ?>' 
        data-publisher='<?php echo $row['publisher']; ?>' 
        data-genre='<?php echo $row['genre']; ?>'>
        View
      </button>
      <button class='btn btn-success'>Edit</button>
      <button class='btn btn-danger'>Delete</button>
    </td>
  </tr>

<?php
    }
  }else{
    echo 
      "<tr>
        <td> 'No result found!' </td>
      </tr>";
  }

mysqli_close($connection)

?>