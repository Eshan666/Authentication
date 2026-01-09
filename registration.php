<?php include 'database.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Registration</title>
</head>
<body>
     <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Authentication App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        <a class="nav-link" href="login.php">Login</a>
        <a class="nav-link" href="registration.php">Registration</a>
        
      </div>
    </div>
  </div>
</nav>

<form action="registration.php" method="POST">
  <label for="name"> name:</label><br>
  <input type="text" id="fname" name="name"><br>
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email"><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password">
  <br>

<label for="subscription">Agree with our policy</label>
<input type="checkbox" id="subscribe" name="subscription" value="yes">
<br>
<button type="submit" name="submit">Submit</button>

</form>

<?php 
if( isset($_POST['submit']) ){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_database);

    $sql = "INSERT INTO `user_data` (`id`, `name`, `email`, `password`, `date`) 
           VALUES (NULL, '$name', '$email', '$password', current_timestamp())";

    mysqli_query($conn, $sql);

    echo "User Registered!";
    sleep(3);

    header("location: login.php");

}

 ?>
  
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>