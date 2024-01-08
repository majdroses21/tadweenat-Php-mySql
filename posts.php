<?php
  session_start();
  include("compon/connection.php");
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">   
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>كل المقالات </title>
  <!-- CSS files -->
  <link rel="stylesheet" href="css/all.css"> <!-- Font awsome file -->
  <link rel="stylesheet" href="css/bootstrap.min.css"> <!-- bootstrape file -->
  <link rel="stylesheet" href="css/bootstrap.min.css.map"> <!-- bootstrape file -->
  <link rel="stylesheet" href="css/dashboard.css"> <!-- style.CSS -->
  <!-- javaScript Files -->
  <script defer src="js/all.min.js"></script> <!-- Font awsome file -->
  <script defer src="js/bootstrap.bundle.min.js"></script> <!-- bootstrape file -->
  <script defer src="js/bootstrap.bundle.min.js.map"></script> <!-- bootstrape file -->
</head>
<body >
  <?php
  include ("compon/header.php");
?>

<!-- On this page, the database posts are obtained and displayed in the form of a table 
      and control of their deletion  -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {}

function deleetif(){
  include("compon/connection.php");
  $del = $_GET['id'];
if (isset($del)) {    
$query = "DELETE FROM post WHERE id = '$del'";
$deleet = mysqli_query($conn, $query);
if (isset($deleet)) {
  echo  "<div class='alert alert-success'> تم الحذف بنجاح  </div>";
}else { 
  echo "<div class='alert alert-danger'> لم يتم الحذف . حدث خطأ ما </div>";;
}
}
 }
 @deleetif();

  ?>
  <?php 
    if (!isset($_SESSION['id'])) {
      echo  "<div class='alert alert-danger'> غير مسموح لك بالدخول إلى هذة الصفحة </div>";
      header('REFRESH:2;URL=login.php');
     } else {
  ?>
  <!-- Start Conant -->
    <div class="content">
        <div class="container-fluid">
          <div class="row">
           <?php include('compon/controlPanel.php'); ?>
            <div class="col-md-10" id="mainArea">
              <!-- Diplay Posts -->
              <table class='table table-borderd'>
                    <tr>
                      <th>رقم المقال</th>
                      <th>عنوان المقال</th>
                      <th>كاتب المقال</th>
                      <th>تصنيف المقال</th>
                      <th>تاريخ المقال</th>
                      <th>صورة المقال</th>
                      <th>حذف المقال</th>
                    </tr>
                    <?php
                $quary = 'SELECT * FROM post ORDER BY id DESC';
                $res  = mysqli_query($conn, $quary);
                $num = '';
                while ($row = mysqli_fetch_assoc($res)) { 
                  $num ++;
                  ?>
                   <tr>
                    <td><?php echo $num ; ?> </td>
                    <td><?php echo $row['post_title'] ; ?> </td>
                    <td><?php echo $row['post_auther'] ; ?> </td>
                    <td><?php echo $row['post_catigory'] ; ?> </td>
                    <td><?php echo $row['post_date'] ; ?> </td>
                    <td><img class='img-fluid img-post' src="uplodes/post_images/<?php echo $row['post_img'] ; ?>" alt="هذا المنشور لا يحتوي على صورة"> </td>
                    <td> <a href="posts.php?id=<?php echo $row['id'] ?>"><button class='btn btn-danger'> X </button></a></td>
                   </tr>
                  <?php }?>
                  </table>
            </div>
          </div>
        </div>
    </div>

  <!-- End Conant -->
  <?php
     }
  include ("compon/footer.php")
  ?>
</body>
</html>