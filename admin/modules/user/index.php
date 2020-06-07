<?php 
$open = "user";
require_once __DIR__. "/../../autoload/autoload.php";

if (isset($_GET['page'])) {
    $p = $_GET['page'];
}else {
    $p = 1;
}

$sql = "select users.* from users order by id desc";

$users = $db->fetchJone("users", $sql, $p, 3, true);

if (isset($users['page'])) {
    $sotrang = $users['page'];
    unset($users['page']);
}
?>

<?php 
require_once __DIR__. "/../../layouts/header.php";
?>
<!--Nội dung -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Quản trị thành viên
            <a href="add.php" class="btn btn-success pull-right">Thêm mới</a>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="clearfix"></div>
<!-- Thông báo lỗi -->
<?php 
require_once __DIR__. "/../../../partials/notification.php";
?>
<!-- /.row -->
<div class="row">
    <div class="col-md-12">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách người dùng
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="dataTables_length" id="dataTables-example_length">
                                    <label>
                                        Show 
                                        <select name="dataTables-example_length" aria-controls="dataTables-example" class="form-control input-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                        entries
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table width="100%" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th>ID</th>
                                            <!-- <th>Avata</th> -->
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $stt = 1; foreach ($users as $item):?>

                                            <tr class="gradeA odd" role="row">
                                                <td class="sorting_1"><?php echo $stt ?></td>
                                                <!-- <td>
                                                    <img class="img-circle" src="<?php //echo uploads() ?>user/<?php echo $item['avata'] ?>" alt="" height="50px" width="50px">
                                                </td> -->
                                                <td><?php echo $item['name'] ?></td>
                                                <td><?php echo $item['email'] ?></td>
                                                <td><?php echo $item['phone'] ?></td>
                                                <td class="center">
                                                    <a class="btn btn-xs btn-info"href="edit.php?id=<?php echo $item['id'] ?>"><i class="fa fa-edit">Sửa</a>
                                                    <a class="btn btn-xs btn-danger" onclick="return confirmActionDelete()" href="delete.php?id=<?php echo $item['id'] ?>"><i class="fa fa-times"></i> Xóa</a>
                                                </td>
                                            </tr>
                                        <?php $stt++; endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="pull-right">
                                <nav aria-lable="Page navigation" class="clearfix">
                                    <ul class="pagination">
                                        <li>
                                            <a href="" aria-lable = Previous>
                                                <span aria-hidden = "true">&laquo;</span>
                                            </a>
                                        </li>
                                        <?php for($i = 1; $i <= $sotrang; $i++): ?>
                                            <?php
                                            if (isset($_GET['page'])) {
                                                $p = $_GET['page'];
                                            }else{
                                                $p = 1;
                                            }
                                            ?>
                                            <li class="<?php echo ($i == $p) ? 'active' : '' ?>">
                                                <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                            </li>
                                        <?php endfor ?>
                                        <li>
                                            <a href="" aria-lable = Next>
                                                <span aria-hidden = "true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>

                                </nav>
                            </div>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
        </div>
    </div>
    <!-- kết thúc nội dung -->
    <?php 
    require_once __DIR__. "/../../layouts/footer.php";
    ?>

<SCRIPT LANGUAGE="JavaScript">
    function confirmActionDelete()
    {
        return confirm("Bạn có chắc chắn muốn xóa không?")
    }
</SCRIPT>