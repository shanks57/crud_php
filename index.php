<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM todo ORDER BY id DESC");
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
      <form class="form-group" action="" method="post" name="add">
        <input type="text" class="w-50 mx-auto text-center form-control" name="todo" id="todo" aria-describedby="helpId"
          placeholder="input your todo" />
        <button type="submit" name="tambah" class="btn btn-outline-primary my-3 text-center">Add Todo</button>
      </form>

      <?php

   
    if(isset($_POST['tambah'])) {
        $todo = $_POST['todo'];
        
        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO todo(todo, done) VALUES('$todo', 0)");

        // reload
        header("Refresh:0");
    }
    ?>

      <ul class="list-group w-50 mx-auto">
        <?php  
          while($user_data = mysqli_fetch_array($result)) {   
            
              echo '<li class="list-group-item">
                '.$user_data['todo'].'
                <a class="btn btn-danger float-right" href="delete.php?id=$user_data[id]"> hapus </a>
                <a class="btn btn-warning float-right" href="edit.php?id=$user_data[id]" > edit </a>
        </li>
        ';


        }
        ?>
      </ul>





    </div>

    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
  </body>

</html>