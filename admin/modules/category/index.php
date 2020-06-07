<?php
   $open = "category";
   require_once __DIR__. "/../../autoload/autoload.php";
   
   
   $category=$db->fetchAll("category");
   
?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>
<!-- Page Heading NOI DUNG-->
<div class="row">
   <div class="col-lg-12">
      <h1 class="page-header">
         Danh Sách Sản Phẩm
         <a href="add.php" class="btn btn-info">Thêm mới</a>
      </h1>
      <ol class="breadcrumb">
         <li>
            <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
         </li>
         <li class="active">
            <i class="fa fa-file"></i> Sản Phẩm
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
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Home</th>
                  <th>Created</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php $stt = 1; foreach ($category as $item): ?>
               <tr>
                  <td><?php echo $stt ?></td>
                  <td><?php echo $item['name'] ?></td>
                  <td><?php echo $item['slug'] ?></td>
                  <td>

                     <a href="home.php?id=<?php echo $item['id'] ?>" class="btn btn-xs <?php echo $item['home'] == 1 ? 'btn-info' :  'btn-default' ?>">
                     <?php echo $item['home'] == 1 ? 'Hiển thị' : 'Không' ?>   
                     </a>
                     
                  </td>
                  <td><?php echo $item['created_at'] ?></td>
                  <td>
                     <a class="btn btn-xs btn-info"href="edit.php?id=<?php echo $item['id'] ?>"><i class="fa fa-edit">Sửa</a>
                     <a class="btn btn-xs btn-danger"href="delete.php?id=<?php echo $item['id'] ?>"><i class="fa fa-times">Xóa</a>
                  </td>
               </tr>
               <?php $stt++; endforeach ?>
            </tbody>
         </table>
         <!-- /.phần này là stt trong khung danh sách danh muc-->
         <div class="pull-right">
            <nav aria-label="Page navigation example ">
               <ul class="pagination">
                  <li class="page-item">
                     <a class="page-link" href="#" aria-label="Previous">
                     <span aria-hidden="true">&laquo;</span>
                     </a>
                  </li>
                  <div>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">4</a></li>
                  <li class="page-item"><a class="page-link" href="#">5</a></li>
                  <li class="page-item">
                  </div>
                  
                     <a class="page-link" href="#" aria-label="Next">
                     <span aria-hidden="true">&raquo;</span>
                     </a>
                  </li>
               </ul>
            </nav>
         </div>
      </div>
   </div>
</div>
<!-- /.row -->
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>
<?php 
?>