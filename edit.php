<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update

?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM todo WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
    $todo = $user_data['todo'];
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Todo List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
 
</head>
<body>

<div class="container text-center p-5 bg-light">
      <h1>Todo List</h1>
      <form class="form-group" action="edit.php" method="post" name="update">
        <input type="text" class="w-50 mx-auto text-center form-control" name="todo" id="todo-update" aria-describedby="helpId"
        value=<?php echo $todo;?> />
        <button type="submit" name="ganti" class="btn btn-outline-primary my-3 text-center">Update</button>
      </form>
      </ul>
    </div>

    <?php
      if(isset($_POST['ganti']))
      {   
          $todo=$_POST['todo'];
          include_once("config.php");
          echo $todo;
          // update user data
          $result = mysqli_query($mysqli, "UPDATE todo SET todo='$todo' WHERE id=$id");

          // Redirect to homepage to display updated user in list
          header("Location: index.php");
      }
    
    ?>
</body>
</html>
