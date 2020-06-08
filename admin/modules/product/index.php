<?php
   $open = "product";
   require_once __DIR__. "/../../autoload/autoload.php";
   
   if(isset($_GET['page']))
   {
      $p=$_GET['page'];
   }
   else
   {
      $p=1;
   }

   $sql="SELECT product.*,category.name as namecate FROM product
         left join category on category.id=product.category_id";
   //product',$sql,$p,1,true số "1"  tượng trưng cho số sản phẩm ở 1 trang
   $product=$db->fetchJone("product",$sql,$p,5,true);

   
   if(isset($product['page']))
   {
      $sotrang=$product['page'];
      unset($product['page']);
   }
   
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
            <i class="fa fa-dashboard"></i>  <a href="http://localhost/tutphp/index.php">Dashboard</a>
         </li>
         <li class="active">
            <i class="fa fa-file"></i> <!--Sản Phẩm-->Danh mục
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
                  <th>Category</th>
                  <th>Slug</th>
                  <th>Thunbar</th>
                  <th>Info</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php $stt = 1; foreach ($product as $item): ?>
               <tr>
                  <td><?php echo $stt ?></td>
                  <td><?php echo $item['name'] ?></td>
                  <td><?php echo $item['namecate'] ?></p></td>
                  <td>
                     <img src="<?php echo uploads() ?>product/<?php echo$item['thunbar'] ?>" width="100px" height="100px"> 
                  </td>
                  <td><?php echo $item['slug'] ?></td>
                  <td>
                     <ul>
                        <li>Giá : <?php echo $item['price'] ?></li>
                        <li>Số Lượng : <?php echo $item['number'] ?></li>
                     </ul>
                  </td>
                  <td>
                     <a class="btn btn-xs btn-info"href="edit.php?id=<?php echo $item['id'] ?>"><i class="fa fa-edit">Sửa</a>
                     <a class="btn btn-xs btn-danger"href="delete.php?id=<?php echo $item['id'] ?>"><i class="fa fa-times">Xóa</a>
                  </td>
               </tr>
               <?php $stt ++ ; endforeach ?>
            </tbody>
         </table>
         <!-- /.phần này là phân trang  trong khung danh sách danh muc-->



            <div class="pull-right">
                  <nav aria-lable="Page navigation" class="clearfix">
                     <ul class="pagination">
                        <li>
                           <a href="" aria-lable = Previous>
                              <span aria-hidden = "true">&laquo;</span>
                           </a>
                        </li>

                        <?php for( $i = 1 ; $i <= $sotrang ; $i++) : ?>
                              <?php 
                              if (isset($_GET['page'])) 
                              {
                                 $p=$_GET['page'];
                              }
                              else
                              {
                                 $p = 1;
                              }
                              ?>
                              <div class="row">
                              <li class="<?php echo ($i == $p) ? 'active' : '' ?>">
                                 <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                              </li>
                           </div>
                        <?php endfor; ?>
                        <li class="page-item">
                           <a href="" aria-lable = Next>
                              <span aria-hidden = "true">&raquo;</span>
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