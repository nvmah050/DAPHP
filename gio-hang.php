<?php 
   require_once __DIR__. "/autoload/autoload.php"; 
   $sum = 0;

   if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0)
   {
      echo "<script>alert('Không có sản phẩm trong giỏ hàng!!!!'); location.href='index.php'</script>";   
   }

?>
<?php   require_once __DIR__. "/layouts/header.php"; ?>
<div class="col-md-9 bor">
   <section class="box-main1">
      <h3 class="title-main"><a href=""> Giỏ Hàng Của Bạn</a> </h3>
      <table class="table table-hover" id="shoppingcart_info">
         <thead>
            <tr>
               <th>STT</th>
               <th>Tên Sản Phẩm</th>
               <th>Hình Ảnh</th>
               <th>Số lượng</th>
               <th>Giá</th>
               <th>Tổng tiền</th>
               <th>Thao tác</th>
            </tr>
         </thead>
         <tbody>
            <?php  $stt = 1; foreach ($_SESSION['cart'] as $key => $value): ?>
            <tr>
               <td><?php echo $stt ?></td>
               <td><?php echo $value['name'] ?></td>
               <td><img src="<?php echo uploads() ?>product/<?php echo $value['thunbar'] ?>" width="80px" height = "80px" alt=""></td>
               <td>
                  <input type="number" name="qty" class="form-control qty" id="qty" min="1" value="<?php echo $value['qty'] ?>" style="width: 70px">  
               </td>
               <td><?php echo formatprice($value['price']) ?></td>
               <td><?php echo formatprice($value['price'] * $value['qty']) ?></td>
               <td>
                  <a href="remove_product_in_cart.php?key=<?php echo $key ?>" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i> Remove</a>
                  <a href="" class="btn btn-xs btn-info updatecart" data-key=<?php echo $key ?>><i class="fa fa-refresh"></i> Update</a>
                  
               </td>
            </tr>
            <?php $sum += $value['price'] * $value['qty']; $_SESSION['tongtien']= $sum ; ?>
            <?php $stt ++; endforeach  ?>
         </tbody>
      </table>
      <div class="row">
         <div class="col-md-5 pull-right">
            <ul class="list-group">
               <li class="list-group-item active text-center">
                  Thông tin đơn hàng
               </li>
               <li class="list-group-item">Tổng thành tiền: <span class="pull-right"><?php echo formatprice($_SESSION['tongtien']); ?> </span></li>
               <li class="list-group-item">Thuế VAT: <span class="pull-right">5%</span></li>
               <li class="list-group-item">Phí vận chuyển: </li>
               <li class="list-group-item">Giảm giá: </li>
               <?php $_SESSION['total'] = $_SESSION['tongtien']*105/100 ?>
               <li class="list-group-item">Tổng tiền cần thanh toán: <span class="pull-right"><?php echo formatprice($_SESSION['total']) ?></span></li>
            </ul>
            <ul>
               <li><i class="text-danger">+ Những đơn hàng trong nội thành thì miễn phí phí vận chuyển</i></li>
            </ul>
            <ul class="text-center" style="margin-top: 10px; margin-bottom: 10px">
               <a class="btn btn-success" href="thanh-toan.php">Thanh toán</a>
               <a class="btn btn-info" href="index.php">Tiếp tục mua hàng</a>
            </ul>
         </div>
      </div>
      <!-- Nội Dung -->
   </section>
</div>
<?php   require_once __DIR__. "/layouts/footer.php"; ?>