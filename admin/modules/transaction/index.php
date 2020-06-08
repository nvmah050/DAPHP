<?php
   $open = "transaction";
   require_once __DIR__. "/../../autoload/autoload.php";
   
   if(isset($_GET['page']))
   {
      $p=$_GET['page'];
   }
   else
   {
      $p=1;
   }

   $sql="SELECT transaction.* , users.name as nameuser, users.phone as phoneuser, users.email as emailuser FROM transaction LEFT JOIN users ON users.id=transaction.users_id ORDER BY ID DESC";
   //product',$sql,$p,1,true số "1"  tượng trưng cho số sản phẩm ở 1 trang
   $transaction=$db->fetchJone('transaction',$sql,$p,10,true);

   
   if(isset($transaction['page']))
   {
      $sotrang=$transaction['page'];
      unset($transaction['page']);
   }
   
   ?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>
<!-- Page Heading NOI DUNG-->
<div class="row">
   <div class="col-lg-12">
      <h1 class="page-header">
         Danh Sách Đơn Hàng
      </h1>
      <ol class="breadcrumb">
         <li>
            <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
         </li>
         <li class="active">
            <i class="fa fa-file"></i>Danh sách
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
                  <th>Status</th>
                  <th>Trạng thái</th>
               </tr>
            </thead>
            <tbody>
               <?php $stt = 1; foreach ($transaction as $item): ?>
               <tr>
                  <td><?php echo $stt ?></td>
                  <td><?php echo $item['nameuser'] ?></td>
                  <td><?php echo $item['emailuser'] ?></td>
                  <td><?php echo $item['phoneuser'] ?></td>
                  <td>
                     
                     <a href="status.php?id=<?php echo $item['id'] ?>" class="btn btn-xs <?php echo  $item['status'] ==0 ? 'btn-danger' : 'btn-info' ?>"><?php echo $item['status'] ==0 ? 'Chưa xử lý' : 'Đã xử lý' ?></a>
                  </td>
                  <td>
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