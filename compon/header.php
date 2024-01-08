<!-- Start Navbar -->

<style>
.img-loogo{
  width: 200px;
  height: 100px;
}
.navbar{
  height: 70px;
}
.user-icon-lg{
  font-size: 30px;
  color: var(--first);
  cursor: pointer;
  margin-left: 50px;
  margin-bottom: 20px;
}
.user-icon{
  font-size: 30px;
  color: var(--first);
  cursor: pointer;
  margin-left: 50px;
  margin-bottom: 20px;
  display: none;
}
@media (max-width : 420px)  {
  .img-loogo{
    width: 125px !important;
    height: 75px !important;
    margin-top: -15px !important;
  }
  .user-icon{
    display: block;
  }
  .user-icon-lg{
    display: none;
  }

}
@media (min-width : 750px) and (max-width : 1024px) {
  .user-icon{
    display: block;
  }
  .user-icon-lg{
    display: none;
  }
  .img-loogo{
    width: 170px !important;
    height: 80px !important;
    margin-top: -15px !important;
  }
}
</style>
<nav class="navbar navbar-expand-lg bg-body-tertiary ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img class='img-loogo img-fluid' src="images/blog-1.png" alt="logo"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link" href="#">عن المدونة</a>
          <a class="nav-link" href="categories.php">لوحة التحكم</a>
          <a class="nav-link" href="#">شروحات</a>
          <a class="nav-link" href="#">منوعلات</a>
          <a class="nav-link" href="#">اتصل بنا</a>
          <a  href='login.php' class="user-icon"><i class="fa fa-solid fa-user"></i></a> <!-- just For small schreen size -->
        </div> 
      </div> 
      <a  href='login.php' class="user-icon-lg"><i class="fa fa-solid fa-user"></i></a>
    </div>
  </nav>
  <!-- End Navbar -->