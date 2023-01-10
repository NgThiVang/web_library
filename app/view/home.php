<?php 
// if(!isset($_GET['page'])) header('location:../../index.php?page=home');
 ?>
<div style="border: 1px solid #5b9bd5; height:500px" class="container">
    <div class="row" style="margin-bottom:5px;">
        <label for="">Tên login: <span><?php if (isset($_SESSION['authen'])) {
                                            echo $_SESSION['authen']['login_id'];
                                        } ?></span></label>
    </div>
    <div class="row" style="margin-bottom:50px;">
        <label for="">Thời gian login : <span><?php if (isset($_SESSION['timelogin'])) {
                                                    echo $_SESSION['timelogin'];
                                                } ?></span></label>
    </div>
    <div class="row" style="margin-bottom:20px;">
        <a href="index.php?page=logout">LOGOUT</a>
    </div>
    <div class="row">
        <div class="col">
            <label for="">Phòng học</label>
            <ul class="list-group list-group-flush">
                <a style="text-decoration: none" href="">
                    <li style="color:blue;border:none" class="list-group-item">Tìm kiếm</li>
                </a>
                <a style="text-decoration: none" href="">
                    <li style="color:blue;border:none" class="list-group-item">Thêm mới</li>
                </a>
            </ul>
        </div>
        <div class="col">
            <label for="">Người dùng</label>
            <ul class="list-group list-group-flush">
                <a style="text-decoration: none" href="">
                    <li style="color:blue;border:none" class="list-group-item">Tìm kiếm</li>
                </a>
                <a style="text-decoration: none" href="index.php?page=user_add_input">
                    <li style="color:blue;border:none" class="list-group-item">Thêm mới</li>
                </a>
            </ul>
        </div>
        <div class="col">
            <label for="">Sách</label>
            <ul class="list-group list-group-flush">
                <a style="text-decoration: none" href="">
                    <li style="color:blue;border:none" class="list-group-item">Tìm kiếm</li>
                </a>
                <a style="text-decoration: none" href="">
                    <li style="color:blue;border:none" class="list-group-item">Thêm mới</li>
                </a>
            </ul>
        </div>
        <div class="col">
            <label for="">Mượn/Trả sách</label>
            <ul class="list-group list-group-flush">
                <a style="text-decoration: none" href="">
                    <li style="color:blue;border:none" class="list-group-item">Tìm kiếm</li>
                </a>
                <a style="text-decoration: none" href="">
                    <li style="color:blue;border:none" class="list-group-item">Thêm mới</li>
                </a>
            </ul>
        </div>


    </div>
</div>