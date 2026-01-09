<?php include 'database.php';?>
<?php include 'header.php'; ?>
<?php if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>

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