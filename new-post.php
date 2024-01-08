<!DOCTYPE html>
<html lang="ar" dir="rtl">   
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>إضافة منشور </title>
  <!-- CSS files -->
  <link rel="stylesheet" href="css/all.css"> <!-- Font awsome file -->
  <link rel="stylesheet" href="css/bootstrap.min.css"> <!-- bootstrape file -->
  <link rel="stylesheet" href="css/bootstrap.min.css.map"> <!-- bootstrape file -->
  <link rel="stylesheet" href="css/dashboard.css"> <!-- style.CSS -->
  <link rel="stylesheet" href="css/new-post.css"> <!-- style.CSS -->
  <!-- javaScript Files -->
  <script defer src="js/all.min.js"></script> <!-- Font awsome file -->
  <script defer src="js/bootstrap.bundle.min.js"></script> <!-- bootstrape file -->
  <script defer src="js/bootstrap.bundle.min.js.map"></script> <!-- bootstrape file -->
</head>
<body >
  <?php
    session_start();
    include ("compon/header.php");
    # conenecting DB code
    include('compon/connection.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       
    
    $pTitle = filter_var($_POST['title'], FILTER_SANITIZE_STRING) ;
    $pCat = $_POST['catigories'];
    $pContent = filter_var($_POST['content'], FILTER_SANITIZE_STRING) ;
     $pAuther=  'عبد الرحمن';
    $pAdd = $_POST['add'];

    # IMG 
    $img_name = $_FILES['post_img']['name'];
    $img_tmp = $_FILES['post_img']['tmp_name'];


    ##################### Add post to home page ###################
    if (isset($pAdd)) {
        if(empty($pTitle) || empty($pContent)) {
        echo  "<div class='alert alert-danger'> الرجاء ملئ حقلين العنوان و نص المنشور</div>";
      }
      elseif ($pContent == 9999) {
        echo  "<div class='alert alert-danger'> محتوى المنشور كبيير جداً </div>";
      }
      else {
        $postImage = rand(0,1000). '_'.$img_name;

        move_uploaded_file($img_tmp, 'uplodes\post_images\\'.$postImage);

        $query = "INSERT INTO post(post_title,post_catigory,post_img,post_content,post_auther)
                            VALUES('$pTitle','$pCat','$postImage','$pContent','$pAuther')";


        $res= mysqli_query($conn,$query);
        if (isset($res)) {
          echo  "<div class='alert alert-success'> تمت إضافة المنشور بنجاح</div>";;
        }else {
          echo    "<div class='alert alert-danger'> حدث خظأ ما</div>";
        }

      }
    }

  }
    ?>
    <?php 
    // This Session for chek if user outorazet to enter control panels pages and post and do any think

    if (!isset($_SESSION['id'])) {
      echo  "<div class='alert alert-danger'> غير مسموح لك بالدخول إلى هذة الصفحة </div>";
      header('REFRESH:2;URL=login.php');
     } else {
    ?>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
      <?php include('compon/controlPanel.php'); ?>
        
        <div class="col-md-10" id="mainArea">
          <div class="add-category">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method='POST' enctype='multipart/form-data'>
              <div class="mb-3">
              <label for="title"> عنوان المقال</label>
              <input type="text" name="title" placeholder="عنوان المقال" class="form-control">
            </div>
            <div class="mb-3">
              <label for="cate"> التصنيف</label>
              <select name='catigories' id="cate" class="form-control">
                <?php
                $query= "SELECT * FROM categories";
                $res= mysqli_query($conn,$query);
                while ($row = mysqli_fetch_assoc($res)) {
                   ?>
                     <option ><?php echo $row['cat_name'] ?> </option>
                   <?php
                }
               ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="img" natsort>صورة المقالة</label>
              <input type="file" id="img" class="form-control" name='post_img'>
            </div>
            <div class="form-control">
              <label for="contant">نص المقال</label>
              <TExtarea class="form-control" rows="7" cols="30" name='content'></TExtarea>
            </div>
              <button class="btn btn-add-categ" name='add'>نشر المقال</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
     }
    include ("compon/footer.php")
  ?>



  
  
  
</body>
</html>