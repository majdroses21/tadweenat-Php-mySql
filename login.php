<?php 
  session_start();
  include ('compon/connection.php');
?>
<!DOCTYPE html>
<html lang="ar" dir='rtl'>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <!-- CSS files -->
  <link rel="stylesheet" href="css/all.css"> <!-- Font awsome file -->
  <link rel="stylesheet" href="css/bootstrap.min.css"> <!-- bootstrape file -->
  <link rel="stylesheet" href="css/bootstrap.min.css.map"> <!-- bootstrape file -->
  <link rel="stylesheet" href="css/tadwenatStyle.css"> <!-- style.CSS -->
  <link rel="stylesheet" href="css/login.css"> <!-- style.CSS -->
  <!-- javaScript Files -->
  <script defer src="js/all.min.js"></script> <!-- Font awsome file -->
  <script defer src="js/bootstrap.bundle.min.js"></script> <!-- bootstrape file -->
  <script defer src="js/bootstrap.bundle.min.js.map"></script> <!-- bootstrape file -->
</head>
<body>
    <?php include('compon/header.php'); ?>

    <div class="container">
      <!-- Checking the password and username, if they are in the database, to transfer to the dashboard -->
    <form action="<?php echo $_SERVER['PHP_SELF'] ?> " method='POST'>
      <?php 
      if (isset($_POST['log'])) {
        $admin_mail = $_POST['email'];
        $admin_pass = $_POST['psw'];

        
        



       if (empty($admin_mail) || empty($admin_pass) ) {
        echo  "<div class='alert alert-danger'> الرجاء إادخال إسم المستخدم وكلمة المرور </div>";
       }else{
        $query = "SELECT * FROM admin WHERE e_mail ='$admin_mail' AND passw ='$admin_pass'";
        $res = mysqli_query($conn, $query);
        // $loog = mysqli_fetch_assoc($res);
        $loog = mysqli_fetch_array($res);
        
        if ($loog['e_mail'] == $admin_mail && $loog['passw'] == $admin_pass ) {
          echo  "<div class='alert alert-success'> أهلاً..سيتم التحويل إلى لوحة التحكم</div>";
          $_SESSION['id']= $loog['id_pass'];
          header('REFRESH:2;URL=categories.php');
        } else {
          echo  "<div class='alert alert-danger'> البيانات غير متطابقة </div>";       }
        

       }
      }
     
      ?>
      <h2 class='text-center'>Log in Form</h2>
    
      <div class="input-container">
        <i class="fa fa-envelope icon"></i>
        <input class="input-field" type="text" placeholder="البريد الإلكتروني" name="email">
      </div>
    
      <div class="input-container">
        <i class="fa fa-key icon"></i>
        <input class="input-field" type="password" placeholder="كلمة المرور" name="psw">
      </div>
    
      <button type="submit" class="btn" name='log'>LogIn </button>
    </form>

    </div>







    <?php include('compon/footer.php'); ?>
</body>
</html>