<?php 

    require_once __DIR__. "/autoload/autoload.php";


    $sqlHomecate = "SELECT name, id FROM category WHERE home = 1 ORDER BY updated_at ";
    $categoryHome = $db-> fetchsql($sqlHomecate);


    $data=[];
    //foreach ($categoryHome as $item) {
    //    $cateId= intval($item['id']);
    //    $sql="SELECT * FROM  product WHERE category_id = $cateId";
    //    $productHome= $db-> fetchsql($sql);
    //    $data[$item['name']]= $productHome;
    //}
    
 
?>

   <?php   require_once __DIR__. "/layouts/header.php"; ?>
        <div class="col-md-9 bor">
            <section id="slide" class="text-center" >
                    <img src="<?php echo base_url() ?>public/frontend/images/slide/baner.jpg" class="" width="100%">
            </section>
                <section class="box-main1">
                    <h3 class="title-main"><a href=""> Các Sản Phẩm Nổi Bật</a> </h3>
                    <div class="navigat">
                        <?php foreach ($categoryHome as $item) {
                            $cateId = intval($item['id']);
                            $sql = "SELECT * FROM product WHERE category_id = $cateId ";
                            $productHome = $db->fetchsql($sql);
                            ?>
                            <div class="showitem" style="margin-top: 10px; margin-bottom: 10px;">
                                <?php foreach ($productHome as $item): ?>
                                    <div class="col-md-3 item-product bor">
                                        <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                                            <img src="<?php echo uploads() ?>/product/<?php echo $item['thunbar'] ?>" class="" width="100%" height="200">
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
                        <?php } ?>           
                    </div>        
                </section>    
        </div>
   <?php   require_once __DIR__. "/layouts/footer.php"; ?>     
