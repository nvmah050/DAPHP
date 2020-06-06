<?php

      require_once __DIR__. "/autoload/autoload.php";

      $category = $db->fetchAll("category");
      


?>


<?php require_once __DIR__. "/layouts/header.php"; ?>
               <!-- Page Heading NOI DUNG-->
               <div class="row">
                  <div class="col-lg-12">
                     <h1 class="page-header">
                        Chào Mừng Bạn Đến Với Trang Trị Của ADMIN
                     </h1>
                     <ol class="breadcrumb">
                        <li>
                           <i class="fa fa-dashboard"></i>  <a href="http://localhost/tutphp/index.php">Trang Chủ</a>
                        </li>
                        <li class="active">
                           <i class="fa fa-file"></i> Blank Page
                        </li>
                     </ol>

                  </div>
               </div>
               <!-- /.row -->
<?php require_once __DIR__. "/layouts/footer.php"; ?>

<?php 

?>