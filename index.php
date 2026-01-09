
<?php include 'header.php'; ?>
<?php if(!isset($_SESSION['user_id'])){
          header("location: login.php");
          exit;
        }?>

<h2><?php echo $_SESSION["user_id"] ?></h2>
<h2><?php echo $_SESSION["user_name"] ?></h2>
<h2><?php echo $_SESSION["user_email"] ?></h2>



    
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>