<!DOCTYPE html>
<html lang="ar" dir="rtl">   
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php 
    include("compon/connection.php");
    $query = "SELECT * FROM post";
    $res = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($res);
    echo $row['post_title'];
    ?>
  </title>
  <!-- CSS files -->
  <link rel="stylesheet" href="css/all.css"> <!-- Font awsome file -->
  <link rel="stylesheet" href="css/bootstrap.min.css"> <!-- bootstrape file -->
  <link rel="stylesheet" href="css/bootstrap.min.css.map"> <!-- bootstrape file -->
  <link rel="stylesheet" href="css/tadwenatStyle.css"> <!-- style.CSS -->
  <!-- javaScript Files -->
  <script defer src="js/all.min.js"></script> <!-- Font awsome file -->
  <script defer src="js/bootstrap.bundle.min.js"></script> <!-- bootstrape file -->
  <script defer src="js/bootstrap.bundle.min.js.map"></script> <!-- bootstrape file -->
</head>
<body >
<?php
  include("compon/header.php");
  include("compon/connection.php");

  ?>
  <!--  When you click on read more, the full post will be displayed.
        This is the post page.
        The query where id = id is shown in the link -->
  <!-- Start Content -->
  <div class="content mt-3">
    <div class="container">
      <div class="row ">
        <div class="col-md-9">
          <!-- Start php coding -->
          <?php
          $gitId = $_GET['id'];
          $query = "SELECT * FROM post WHERE id ='$gitId'";
          $res = mysqli_query($conn,$query );
          $row = mysqli_fetch_assoc($res);
        
         
            ?>
            
          <div class="post">
            <div class="post-img">
              <img src="uplodes/post_images/<?php echo $row['post_img']; ?>"  alt=" هذا المنشور لايحتوي على صورة">
            </div>
            <div class="post-title mt-3 mb-1">
              <h4><?php echo $row['post_title']; ?> </h4>
            </div>
            <div class="post-details">

              <div class="post-info">
                <span> <i class="fa fa-solid fa-user"></i> <?php echo $row['post_auther']; ?></span>
                <span><i class="fa fa-solid fa-calendar-days"></i> <?php echo $row['post_date']; ?></span>
                <span><i class="fa fa-solid fa-tags"></i> <?php echo $row['post_catigory']; ?></span>
              </div>

              <p class='post-content'>  <?php echo $row['post_content']; ?> </p>
            </div>
          </div>
          <!-- End php coding -->
        </div>
        <!-- Start Slide bar -->
        <div class="col-md-3">
         <?php include('compon/catyg.php'); ?>
          <!-- Start Last posts -->
          <?php include('compon/lastest.php'); ?>
        <!-- End Last posts -->
        </div>
        <!-- End Slide bar -->
      </div>
    </div>
  </div>
  <!-- End Content -->
  

  
  <?php
  include("compon/footer.php")
  ?>
</body>
</html>
