<?php include 'database.php'; ?>
<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Login</title>
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


<form action="login.php" method="POST">
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email"><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password">
  <br>
  <button type="submit" name="submit">Submit</button>
    
</form>

<?php
if(isset($_POST['submit'])){
$email = $_POST['email'];
$password = $_POST['password'];

echo $email;
echo $password;

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_database);

$sql = "SELECT * FROM user_data WHERE email = '$email'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 0){
  echo "Email could not be found!";
  exit;
}
if(mysqli_num_rows($result) > 0){
  $row = mysqli_fetch_assoc($result);

  if($row['email'] == $email && $row['password'] == $password){
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_name'] = $row['name'];
    $_SESSION['user_email'] = $row['email'];
    echo "You can log in";
    header("location: index.php");
  }else{
     echo "Invalid password";
     exit;
  }

}

      

}

?>

    
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>