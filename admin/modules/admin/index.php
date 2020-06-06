<?php
   $open = "admin";
   require_once __DIR__. "/../../autoload/autoload.php";
   
   if(isset($_GET['page']))
   {
      $p=$_GET['page'];
   }
   else
   {
      $p=1;
   }

   $sql="SELECT admin.* FROM admin ORDER BY ID DESC  ";
   //product',$sql,$p,1,true số "1"  tượng trưng cho số sản phẩm ở 1 trang
   $admin=$db->fetchJone('admin',$sql,$p,3,true);

   
   if(isset($admin['page']))
   {
      $sotrang=$admin['page'];
      unset($admin['page']);
   }
   
   ?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>
<!-- Page Heading NOI DUNG-->
<div class="row">
   <div class="col-lg-12">
      <h1 class="page-header">
         Danh Sách TK ADMIN
         <a href="add.php" class="btn btn-info">Thêm mới</a>
      </h1>
      <ol class="breadcrumb">
         <li>
            <i class="fa fa-dashboard"></i>  <a href="index.php">Trang Chủ</a>
         </li>
         <li class="active">
            <i class="fa fa-file"></i>Danh mục
         </li>
      </ol>

      <div class="clearfix"></div>
      <!-- câu thông báo lỗi -->
      <?php require_once __DIR__. "/../../../partials/notification.php"; ?>



   </div>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="table-responsive">
         <table class="table table-bordered table-hover">
            <thead>
               <tr>
                  <th>STT</th>
                  <th>Tên</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Cấp bậc phân quyền</th>
                  <th>Trạng thái</th>
               </tr>
            </thead>
            <tbody>
               <?php $stt = 1; foreach ($admin as $item): ?>
               <tr>
                  <td><?php echo $stt ?></td>
                  <td><?php echo $item['name'] ?></td>
                  <td><?php echo $item['email'] ?></td>
                  <td><?php echo $item['phone'] ?></td>
                  <td><?php echo $item['level'] ?></td>
                  <td>
                     <a class="btn btn-xs btn-info"href="edit.php?id=<?php echo $item['id'] ?>"><i class="fa fa-edit">Sửa</a>
                     <a class="btn btn-xs btn-danger"href="delete.php?id=<?php echo $item['id'] ?>"><i class="fa fa-times">Xóa</a>
                  </td>
               </tr>
               <?php $stt++; endforeach ?>
            </tbody>
         </table>
         <!-- /.phần này là phân trang  trong khung danh sách danh muc-->

         </div>

         </div>
      </div>
   </div>
</div>
<!-- /.row -->
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>
<?php 
?>