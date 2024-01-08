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
  <title>لوحة التحكم</title>
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

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $cName = $_POST['seactions'];

  $cAdd = $_POST["add"];
  
  # <!--When clicking on the Add button, it checks if the input is empty. If it is not empty,
  # the content of the input is converted to the database.  -->
  if (isset($cAdd)) {
    if (empty($cName)) {
      echo  "<div class='alert alert-danger'> 'الرجاء إادخال إسم التصنيف' </div>";
    }
    /*
    elseif($cName > 10){
      echo " اسم التصنيف كبيير ";
    }
    */
    else{
      $query = "INSERT INTO categories(cat_name) VALUES('$cName')";
      mysqli_query($conn, $query);
      echo  "<div class='alert alert-success'> 'تمت إضافة التصنيف بنجاح' </div>";
    }
  }
  
     }  
     #$@@@@$#
      #<!-- This function deletes the classification from the table and from the database 
      #when the x button is pressed -->
     function deleetif(){
      include("compon/connection.php");
      $del = $_GET['id'];
  if (isset($del)) {    
    $query = "DELETE FROM categories WHERE cat_id = '$del'";
    $deleet = mysqli_query($conn, $query);
    if (isset($deleet)) {
      echo  "<div class='alert alert-success'> تم الحذف بنجاح  </div>";
    }else { 
      echo "<div class='alert alert-danger'> لم يتم الحذف . حدث خطأ ما </div>";;
    }
  }
     }
     @deleetif();

  // <!-- It checks if the user is logged in. If the user is not registered, this page will not be shown to him -->

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
                <div class="add-category">
                  <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                    <div class="mb-3">
                    <label for="category">تصنيف جديد</label>
                    <input type="text" name="seactions" placeholder="اسم التصنيف" class="form-control">
                  </div>
                    <button class="btn btn-add-categ" name="add">إضافة</button>
                  </form>
                </div>
                <!-- Display Cate -->
                <div class="display-cat mt-5">
                <table class='table table-borderd'>
                  <tr>
                    <th>رقم الفئة </th>
                    <th>اسم الفئة</th>
                    <th>تاريخ الإضافة</th>
                    <th>حذف التصنيف</th>
                  </tr>
                  <?php $no ='0' ?>
                  <?php
                    $query = 'SELECT * FROM categories ORDER BY cat_date DESC';
                    $res = mysqli_query($conn,$query);
                    while ($row = mysqli_fetch_assoc($res)) {
                      $no++;
                      ?>
                      <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $row['cat_name'] ?></td>
                        <td><?php echo $row['cat_date'] ?></td>
                        <td> <a href="categories.php?id=<?php echo $row['cat_id'] ?>"><button class='btn btn-danger'> X </button></a></td>
                      </tr>
                      <?php
                    }
                  ?>
                </table>
                </div>
            </div>
          </div>
        </div>
    </div>

  <!-- End Conant -->
  <br><br><br>
  <?php
     }
  include ("compon/footer.php")
  ?>
</body>
</html>