<?php
   $open = "admin";
   require_once __DIR__. "/../../autoload/autoload.php";
   /**
   *Danh  sách danh mục sản phẩm
   */

      $data = 
      [
         "name" => postInput('name'),
         "email" => postInput("email"),
         "phone"=>postInput("phone"),
         "password"=>MD5(postInput("password")),
         "address"=>postInput("address"),
         "level"=>postInput("level")
      ];
   
   if($_SERVER["REQUEST_METHOD"] == "POST")
   {  

      $error=[];
   
      if(postInput('name') == '')
      {
         $error['name'] = "Mời Bạn Nhập đầy đủ tên ! ";
      }

   
      if(postInput('email') == '')
      {
         $error['email'] = "Mời Bạn nhập email !";
      }
      else
      {
         $is_check = $db->fetchOne("admin"," email = '".$data['email']."' ");
         if($is_check != NULL)
         {
            $error['email'] = "Email bạn đã tồn tại";
         }
      }
   
      if(postInput('phone') == '')
      {
         $error['phone'] = "Mời Bạn nhập số điện thoại ! ";
      }
   
      if(postInput('password') == '')
      {
         $error['password'] = "Mời Bạn nhập mật khẩu ! ";
      }

      if ($data['password'] != MD5(postInput("re_password"))) 
      {
         $error['password'] = "Mật khẩu không khớp ! ";
      }

      if(postInput('address') == '')
      {
         $error['address'] = "Mời Bạn nhập địa chỉ ! ";
      }
      
   
      
   
      // error trống có nghĩa không lỗi 
      if(empty($error))
      {
         
         $id_insert=$db->insert("admin",$data);
         if($id_insert) {

               $_SESSION['success']="Thêm mới thành công!";
               redirectAdmin("admin");
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
         Thêm mới Admin or CTV
      </h1>
      <ol class="breadcrumb">
         <li>
            <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
         </li>
         <li>
            <i></i>  <a href="">Admin</a>
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
            
            <div class="form-group">
               <div class="row">
                  <label for="inputEmail3" class="col-sm-3 control-label">Họ Và Tên : </label>
                  <div class="col-sm-4">
                     <input type="text" class="form-control" id="inputEmail3" placeholder="Nhập Họ Tên " name="name" value="<?php echo $data['name'] ?>">
                     <?php if(isset($error['name'])): ?>
                     <p class="text-danger"><?php echo $error['name'] ?></p>
                     <?php endif ?>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <label for="inputEmail3" class="col-sm-3 control-label">Email : </label>
                  <div class="col-sm-4">
                     <input type="email" class="form-control" id="inputEmail3" placeholder="Nhập email vào đây" name="email" value="<?php echo $data['email'] ?>">
                     <?php if(isset($error['email'])): ?>
                     <p class="text-danger"><?php echo $error['email'] ?></p>
                     <?php endif ?>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <label for="inputEmail3" class="col-sm-3 control-label">Phone : </label>
                  <div class="col-sm-4">
                     <input type="number" class="form-control" id="inputEmail3" placeholder="Nhập số điện thoại" name="phone" value="<?php echo $data['phone'] ?>">
                     <?php if(isset($error['phone'])): ?>
                     <p class="text-danger"><?php echo $error['phone'] ?></p>
                     <?php endif ?>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <label for="inputEmail3" class="col-sm-3 control-label">Password : </label>
                  <div class="col-sm-4">
                     <input type="password" class="form-control" id="inputEmail3" placeholder="********" name="password" value="<?php echo $data['name'] ?>">
                     <?php if(isset($error['password'])): ?>
                     <p class="text-danger"><?php echo $error['password'] ?></p>
                     <?php endif ?>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <label for="inputEmail3" class="col-sm-3 control-label"> Nhập Lại Password : </label>
                  <div class="col-sm-4">
                     <input type="password" class="form-control" id="inputEmail3" placeholder="********" name="re_password" required="">
                     <?php if(isset($error['re_password'])): ?>
                     <p class="text-danger"><?php echo $error['re_password'] ?></p>
                     <?php endif ?>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <label for="inputEmail3" class="col-sm-3 control-label">Địa Chỉ : </label>
                  <div class="col-sm-4">
                     <input type="text" class="form-control" id="inputEmail3" placeholder="Nhập địa chỉ " name="address" value="<?php echo $data['address'] ?>">
                     <?php if(isset($error['address'])): ?>
                     <p class="text-danger"><?php echo $error['address'] ?></p>
                     <?php endif ?>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <label for="inputEmail3" class="col-sm-3 control-label">Cấp Bậc Phân Quyền : </label>
                  <div class="col-sm-4">
                     <select class="form-control" name="level">
                        <option value="1" <?php echo isset($data['level']) && $data['level']==1 ? "selected ='selected'" : '' ?>>Admin</option>
                        <option value="2" <?php echo isset($data['level']) && $data['level']==2 ? "selected ='selected'" : '' ?>>CTV</option>
                     </select>
                     <?php if(isset($error['level'])): ?>
                     <p class="text-danger"><?php echo $error['level'] ?></p>
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

<!-- /.row -->
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>
<?php
   ?>