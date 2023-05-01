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
  include ("compon/header.php")
  ?>
  <!-- Start Conant -->
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-2" id="sideArea">
              <h4> لوحة التحكم</h4>
              <ul>
                <li>
                  <a href="">
                    <span><i class="fa fa-solid fa-tags"></i></span>
                    <span> التصنيفات</span>
                  </a>
                </li>
                <!-- arteclse buton -->
                <li data-bs-target="#menue" data-bs-toggle="collapse">
                  <a href="#">
                    <span><i class="fa fa-solid fa-newspaper"></i></span>
                    <span> المقالات</span>
                  </a>
                </li>
                <!--  -->
                <ul class="collapse second-menue" id="menue">
                  <li>
                    <a href="new-post.php">
                      <span><i class="fa fa-solid fa-edit"></i></span>
                      <span>مقال جديد</span>
                    </a>
                  </li>
                  <li>
                    <a href="">
                      <span><i class="fa fa-solid fa-table"></i></span>
                      <span>كل المقالات </span>
                    </a>
                  </li>
                </ul>
                <!--  -->
                <li>
                  <a href="">
                    <span><i class="fa fa-solid fa-window-restore"></i></span>
                    <span> عرض الموقع</span>
                  </a>
                </li>
                <li>
                  <a href="">
                    <span><i class="fa fa-solid fa-sign-out"></i></span>
                    <span> تسجيل الخروج</span>
                  </a>
                </li>
              </ul>
            </div>
            <div class="col-md-10" id="mainArea">
                <div class="add-category">
                  <form action="">
                    <div class="mb-3">
                    <label for="category">تصنيف جديد</label>
                    <input type="text" name="category" placeholder="اسم التصنيف" class="form-control">
                  </div>
                    <button class="btn btn-add-categ">إضافة</button>
                  </form>
                </div>
            </div>
          </div>
        </div>
    </div>

  <!-- End Conant -->
  <?php
  include ("compon/footer.php")
  ?>
</body>
</html>