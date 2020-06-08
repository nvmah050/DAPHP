<?php 
  require_once __DIR__. "/autoload/autoload.php"; 

  $id=intval(getInput('id'));//Lấy ID gửi lên từ danh mục

  $EditCategory = $db->fetchID("category",$id); // Truy vấn để lấy tên danh mục theo ID

  if(isset($_GET['p']))
  {
    $p=$_GET['p'];
  }
  else
  {
    $p=1;
  }

  $sql= " SELECT * FROM product WHERE category_id = $id"; // Câu truy vấn lấy sản phẩm theo mã danh mục

  $total=count($db->fetchsql($sql));

  $product = $db->fetchJones("product",$sql,$total,$p,10,true); // Thực hiện truy vấn lấy tất cả sản phẩm của danh mục, với phân trang
  $sotrang = $product['page'];
  unset($product['page']);


  $path= $_SERVER['SCRIPT_NAME'];


?>

   <?php   require_once __DIR__. "/layouts/header.php"; ?>
        <div class="col-md-9 bor">

            <section class="box-main1">
                <h3 class="title-main"><a href=""><?php echo $EditCategory['name'] ?></a> </h3>
                	<div class="showitem clearfix">
                        <?php foreach($product as $item): ?>
                            <div class="col-md-3 item-product bor">
                                <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                                    <img src="<?php echo uploads() ?>/product/<?php echo $item['thunbar'] ?>" class="" width="100%" height="180">
                                </a>
                                <div class="info-item">
                                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                                    <p><strike class="sale"><?php echo formatprice($item['price']) ?></strike> <b class="price"><?php echo formatpricesale($item['price'],$item['sale']) ?></b></p>
                                </div>
                                <div class="hidenitem">
                                    <p><a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><i class="fa fa-search"></i></a></p>
                                    <p><a href=""><i class="fa fa-heart"></i></a></p>
                                    <p><a href="addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <nav class="text-center">
                        <ul class="pagination">
                            <?php for ($i=1; $i <= $sotrang; $i++) :?>
                                <li class="<?php echo isset($_GET['p']) && $_GET['p']==$i ? 'active' : '' ?>"><a href="<?php echo $path ?>?id=<?php echo $id ?>&&p=<?php echo $i ?>"><?php echo $i; ?></a></li>
                            <?php endfor ; ?>
                        </ul>
                    </nav>

                	
                 <!-- Nội Dung -->
            </section>

        </div>
   <?php   require_once __DIR__. "/layouts/footer.php"; ?>    


