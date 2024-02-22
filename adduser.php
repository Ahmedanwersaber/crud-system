<?php 
include_once('db.php');
$title="Add user";
$name="";
$email="";
$phone="";
$password="";
$btn_title="Save";
if(isset($_GET['action']) && $_GET['action']=='edit'){
    
    $id=$_GET['id'];
    $sql="SELECT * FROM users WHERE id = ".$id;
    $user =mysqli_query($conn,$sql);
    if($user){
       $title="Update" ;
       $current_user=$user->fetch_assoc();
       $name=$current_user['name'];
       $email=$current_user['email'];
       $phone=$current_user['phone'];
       $password=$current_user['password'];
       $btn_title="Update";

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/feather-icons"></script>

</head>
<body>
   <div class="container">
    <div class="wrapper p-5 m-5 ">
        <div class="d-flex p-2 justify-content-between">
            <h2><?php  echo $title  ?></h2>
            <div><a href="index.php"><i data-feather="corner-down-left"></i></a></div>
        </div>
        <form action="index.php" method="post">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Name</label>
          <input type="name" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Ahmed Anwer" value="<?php echo $name ?>">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Email</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="example@gmail.com" value="<?php echo $email ?>">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Phone</label>
          <input type="tel" class="form-control" id="exampleFormControlInput1" name="phone" placeholder="Phone" value="<?php echo $phone ?>">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleFormControlInput1" name="password" placeholder="password" value="<?php echo $password ?>">
        </div>
        <?php 
             if (isset($_GET['id'])){?>

               <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">

                 <?php }

                  ?>
        <input type="submit" class="btn btn-primary" name="save" value="<?php echo $btn_title ?>">
        </form>
    </div>
   </div>




<script>
  feather.replace();
</script>
    <!-- icone links  -->
<script src="js/icons.js"></script>
</body>
</html>