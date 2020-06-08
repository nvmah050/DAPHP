<?php
   $open = "product";
   require_once __DIR__. "/../../autoload/autoload.php";
   /**
   *Danh  sách danh mục sản phẩm
   */
   $category = $db->fetchAll("category");
   
   if($_SERVER["REQUEST_METHOD"] == "POST")
   {  
      $data = 
      [
         "name" => postInput('name'),
         "slug" => to_slug(postInput("name")),
         "category_id"=>postInput("category_id"),
         "price"=>postInput("price"),
         "number"=>postInput("number"),
         "content"=>postInput("content"),
         "sale"=>postInput("sale")

      ];
      $error=[];
   
      if(postInput('name') == '')
      {
         $error['name'] = "Mời Bạn Nhập đầy đủ tên sản phẩm! ";
      }
   
      if(postInput('category_id') == '')
      {
         $error['category_id'] = "Mời Bạn chọn tên danh mục! ";
      }
   
      if(postInput('price') == '')
      {
         $error['price'] = "Mời Bạn nhập giá tiền! ";
      }
   
      if(postInput('content') == '')
      {
         $error['content'] = "Mời Bạn nhập nội dung! ";
      }

      if(postInput('number') == '')
      {
         $error['number'] = "Mời Bạn nhập số lượng! ";
      }
   
      if(! isset($_FILES['thunbar']))
      {
         $error['thunbar'] = "Mời Bạn chọn hình ảnh! ";
      }
   
      // error trống có nghĩa không lỗi 
      if(empty($error))
      {
         if( isset($_FILES['thunbar']))
         {
            $file_name=$_FILES['thunbar']['name'];
            $file_tmp=$_FILES['thunbar']['tmp_name'];
            $file_type=$_FILES['thunbar']['type'];
            $file_erro=$_FILES['thunbar']['error'];
   
            if($file_erro==0)
            {
               $part= ROOT ."product/";
               $data['thunbar']=$file_name;
            }
         }   
         $id_insert=$db->insert("product",$data);
         if($id_insert) {
               move_uploaded_file($file_tmp, $part.$file_name);
               $_SESSION['success']="Thêm mới thành công!";
               redirectAdmin("product");
         }
         else{
            $_SESSION['error']="Thêm mới thất bại";
         }
      }
         
   }      
   ?>      
<?php require_once __DIR__. "/../../layouts/header.php"; ?>
<!-- Page Heading NOI DUNG-->
<div class="row">
   <div class="col-lg-12">
      <h1 class="page-header">
         Thêm mới Sản Phẩm
      </h1>
      <ol class="breadcrumb">
         <li>
            <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
         </li>
         <li>
            <i></i>  <a href="">Sản Phẩm</a>
         </li>
         <li class="active">
            <i class="fa fa-file"></i> Thêm Mới
         </li>
      </ol>
      <div class="clearfix"></div>
      <!-- câu thông báo lỗi -->
      <?php require_once __DIR__. "/../../../partials/notification.php"; ?>
   </div>
   <div class="container">
      <form class="form-horizontal " action="" method="POST" enctype="multipart/form-data">
         <div class="form-group">
            <div class="row">
               <label for="inputEmail3" class="col-sm-3 control-label">Danh Mục Sản Phẩm</label>
               <div class="col-sm-4">
                  <select class="form-control col-4" name="category_id" id="category_id">
                     <option value="">--Mời Bạn Chọn Danh Mục Sản Phẩm--</option>
                     <?php foreach ($category as $item): ?>
                     <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                     <?php endforeach ?>
                  </select>
                  <!--<p class="text-danger col-4">hiễn thị lỗi ở đây</p>-->
                  <?php if(isset($error['category_id'])): ?>
                  <p class="text-danger col-4"><?php echo $error['category_id'] ?></p>
                  <?php endif ?>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <label for="inputEmail3" class="col-sm-3 control-label">Tên Sản Phẩm</label>
                  <div class="col-sm-4">
                     <input type="text" class="form-control" id="inputEmail3" placeholder="Tên Sản Phẩm" name="name">
                     <?php if(isset($error['name'])): ?>
                     <p class="text-danger"><?php echo $error['name'] ?></p>
                     <?php endif ?>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <label for="inputEmail3" class="col-sm-3 control-label">Giá Sản Phẩm</label>
                  <div class="col-sm-4">
                     <input type="number" class="form-control" id="inputEmail3" placeholder="000" name="price">
                     <?php if(isset($error['price'])): ?>
                     <p class="text-danger"><?php echo $error['price'] ?></p>
                     <?php endif ?>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <label for="inputEmail3" class="col-sm-3 control-label">Số lượng</label>
                  <div class="col-sm-4">
                     <input type="number" class="form-control" id="inputEmail3" placeholder="100" name="number">
                     <?php if(isset($error['number'])): ?>
                     <p class="text-danger"><?php echo $error['number'] ?></p>
                     <?php endif ?>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <label for="inputEmail3" class="col-sm-3 control-label">Giảm Giá </label>
                  <div class="col-sm-4">
                     <input type="number" class="form-control" id="inputEmail3" placeholder="10 %" name="sale" value="0">
                  </div>
               </div>
            </div>
         </div>
         <div class="form-group">
            <div class="row">
               <label for="inputEmail3" class="col-sm-3 control-label">Hình Ảnh</label>
               <div class="col-sm-4">
                  <input type="file" class="form-control" id="inputEmail3" name="thunbar">
                  <?php if(isset($error['thunbar'])): ?>
                  <p class="text-danger"><?php echo $error['thunbar'] ?></p>
                  <?php endif ?>
               </div>
            </div>
         </div>
         <div class="form-group">
            <div class="row">
               <label for="inputEmail3" class="col-sm-3 control-label">Nội Dung</label>
               <div class="col-sm-4">
                  <textarea class="form-control" name="content" rows="4"></textarea>
                     <?php if(isset($error['content'])): ?>
                        <p class="text-danger"><?php echo $error['content'] ?></p>
                     <?php endif ?>
               </div>
            </div>
         </div> 
         <div class="form-group">
            <div class="row"> 
               <div class="col-sm-offset-4 col-sm-3">
                  <button type="submit" class="btn btn-success"> Lưu </button>
               </div>
            </div>
         </div>            
      </form>   
   </div>
</div>      
   
      <!-- code chính sai bỏ di
<div class="row">
   <div class="col-md-12">
      <form class="form-horizontal " action="" method="POST" enctype="multipart/form-data">
         <ul class="form-group1">
            <li>
               <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Danh Mục Sản Phẩm</label>
                  <div class="col-sm-4">
                     <select class="form-control col-md-8" name="category_id">
                        <option value="">--Mời Bạn Chọn Danh Mục Sản Phẩm--</option>
                        <?php foreach ($category as $item): ?>
                        <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                        <?php endforeach ?>
                     </select>
                     <?php if(isset($error['category_id'])): ?>
                     <p class="text-danger"><?php echo $error['category_id'] ?></p>
                     <?php endif ?>
                  </div>
               </div>
            </li>
            <li>
               <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tên Sản Phẩm</label>
                  <div class="col-sm-4">
                     <input type="text" class="form-control" id="inputEmail3" placeholder="Tên Sản Phẩm" name="name">
                     <?php if(isset($error['name'])): ?>
                     <p class="text-danger"><?php echo $error['name'] ?></p>
                     <?php endif ?>
                  </div>
               </div>
            </li>
            <li>
               <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Giá Sản Phẩm</label>
                  <div class="col-sm-4">
                     <input type="number" class="form-control" id="inputEmail3" placeholder="000" name="price">
                     <?php if(isset($error['price'])): ?>
                     <p class="text-danger"><?php echo $error['price'] ?></p>
                     <?php endif ?>
                  </div>
               </div>
            </li>
            <li>
               <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Giảm Giá </label>
                  <div class="col-sm-4">
                     <input type="number" class="form-control" id="inputEmail3" placeholder="10 %" name="sale" value="0">
                  </div>
               </div>
            </li>
            <li>
               <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Hình Ảnh</label>
                  <div class="col-sm-4">
                     <input type="file" class="form-control" id="inputEmail3" name="thunbar">
                     <?php if(isset($error['thunbar'])): ?>
                     <p class="text-danger"><?php echo $error['thunbar'] ?></p>
                     <?php endif ?>
                  </div>
               </div>
            </li>
            <li>
               <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nội Dung</label>
                  <div class="col-sm-4">
                     <textarea class="form-control" name="content" rows="4"></textarea>
                     <?php if(isset($error['content'])): ?>
                     <p class="text-danger"><?php echo $error['content'] ?></p>
                     <?php endif ?>
                  </div>
               </div>
            </li>
            <div class="form-group">
               <div class="col-sm-offset-2 col-sm-3">
                  <button type="submit" class="btn btn-success"> Lưu </button>
               </div>
            </div>
            </li>
         </ul>
      </form>
   </div>
</div>  -->
<!-- /.row -->
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>
<?php
   ?>