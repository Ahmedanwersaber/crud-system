<?php
include_once('db.php');
$action = false;
if (isset($_POST['save'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  if ($_POST['save'] == "Save") {
    $save_sql = "INSERT INTO `users`( `name`, `email`, `password`, `phone`) VALUES 
          ('$name','$email','$password','$phone')";
  }else{
    $id= $_POST['id'] ;
    $save_sql = "UPDATE `users` SET `name`='$name',`email`='$email' ,`phone`='$phone' ,
    `password`='$password' WHERE id =$id " ;
    }
  

  $res_save = mysqli_query($conn, $save_sql);
  if (!$res_save) {
    die(mysqli_error($conn));

  } else {
    if (isset($_POST['id'])){
      $action = "edit";
    }else{
      $action = "add";
    }

  }

}
if (isset($_GET['action']) && $_GET['action'] == 'del') {
  $id = $_GET['id'];
  $del_sql = "DELETE FROM users WHERE id = $id";
  $res_del = mysqli_query($conn, $del_sql);
  if (!$res_del) {
    die(mysqli_error($con));

  } else {
    $action = "del";
  }
}
$users_sql = "SELECT * FROM users";
$all_user = mysqli_query($conn, $users_sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link href="css\toster.css" rel="stylesheet"/>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"> -->
    <script src="https://unpkg.com/feather-icons"></script>



</head>
<body>
   <div class="container">
    <div class="wrapper p-5 m-5 ">
        <div class="d-flex p-2 justify-content-between mb-2">
            <h2>All users</h2>
            <div><a href="adduser.php"><i data-feather="user-plus"></i></a></div>
    
        </div>
    <hr>
    <table class="table table-hover">
        <thead>
    <tr class="table-success">
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">action</th>

    </tr>
  </thead>
  <tbody >
    <?php
while($user=$all_user->fetch_assoc()){?>
<tr></tr>
    <td ><?php echo $user['id']; ?></td>
    <td><?php echo $user['name']; ?></td>
    <td><?php echo $user['email']; ?></td>
    <td><?php echo $user['phone']; ?></td>
    <td >
      <div class="d-flex justify-content-evenly mb-2 p-2 ">
      <i onclick="confirm_delete(<?php echo $user['id']; ?>);" class="text-danger" data-feather="trash-2"></i>
    <i onclick="edit(<?php echo $user['id']; ?>);" class="text-success" data-feather="edit"></i>
  </div>
</td>
</tr>

    <?php
}

?>
  </tbody>
</table>
   </div>
</div>





    <!-- icone links  -->

    
    <script src="js/jquery.js"></script>
    <script src="js/icons.js"></script>
    <script src="js\toster.js"></script>
    <script src="js\main.js"></script>
    <?php
  if ($action != false) {
    if ($action == 'add') { ?>
      <script>
        show_add()
      </script>


      <?php
    }
    if ($action == 'del') { ?>
      <script>
        show_del()
      </script>


      <?php
    }
    if ($action == 'edit') { ?>
      <script>
        show_update()
      </script>


      <?php
    }
  }
  ?>
    <script>
  feather.replace();
</script>
</body>
</html>