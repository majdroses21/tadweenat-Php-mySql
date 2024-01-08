<!DOCTYPE html>
<html lang="ar" dir="rtl">   
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>تدويناتي</title>
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
  
  <!-- On the home page, when you click on a specific category,
    all similar categories are displayed
    This is the page that shows all the categories that are inside the link in the id -->
  <!-- Start Content -->
  <div class="content mt-3">
    <div class="container">
      <div class="row ">
        <div class="col-md-9">
          <!-- Start php coding -->
          <?php
          $sec = $_GET['secId'];
          $query = "SELECT * FROM post  WHERE post_catigory='$sec' ORDER BY id DESC";
          $res = mysqli_query($conn,$query );

          while ($row = mysqli_fetch_assoc($res)) {
            ?>
            
          <div class="post">
            <div class="post-img">
              <a href="thePost.php?id=<?php echo $row['id']; ?>=<?php echo $row['id']; ?>"> <img src="uplodes/post_images/<?php echo $row['post_img']; ?>"  alt=" هذا المنشور لايحتوي على صورة"> </a>
            </div>
            <div class="post-title mt-3 mb-1">
              <h4><a href="thePost.php?id=<?php echo $row['id']; ?>"><?php echo $row['post_title']; ?> </a></h4>
            </div>
            <div class="post-details">

              <div class="post-info">
                <span> <i class="fa fa-solid fa-user"></i> <?php echo $row['post_auther']; ?></span>
                <span><i class="fa fa-solid fa-calendar-days"></i> <?php echo $row['post_date']; ?></span>
                <span><i class="fa fa-solid fa-tags"></i> <?php echo $row['post_catigory']; ?></span>
              </div>

              <p class='post-content'>
                 <?php 
                 if (strlen($row['post_content']) > 150) {
                  $row['post_content'] = substr($row['post_content'],0,300)."......." ;
                 }
                 echo $row['post_content']; ?>
                </p>
              <a href="thePost.php?id=<?php echo $row['id']; ?>"> <button class="btn btn-tadwinat"> إظهار المزيد</button> </a>
            </div>
          </div>
          <?php }?>
          <!-- End php coding -->
        </div>
        <!-- Start Slide bar -->
        <div class="col-md-3">
          <!--Start catagories -->
          <?php include('compon/catyg.php'); ?>
          
          <!--End catagories -->
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