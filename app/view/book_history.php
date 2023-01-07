<?php if (!isset($_GET['page'])) header('location:../../index.php?page=book_history'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./web/css/style_book_history.css">
</head>

<body>

    <div class="main">
        <form action="" method="POST" id="form" enctype="multipart/form-data">
            <div class="wrapper">
                <div class="search-">
                    <div class="form-group">
                        <label class="form-label">Tên sách</label>
                        <div class="form-input">
                            <select class="hello" id="bookId" name="bookId">
                                <option value=""></option>
                                <?php
                                for ($i = 0; $i < count($books); $i++) {
                                    if ($books[$i]['id'] === $_SESSION['bookId']) {
                                        echo '<option value="' . $books[$i]['id'] . '" selected="selected">' . $books[$i]['name'] . '</option>';
                                    } else {
                                        echo '<option value="' . $books[$i]['id'] . '">' . $books[$i]['name'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Người dùng</label>
                        <div class="form-input">
                            <select class="hello" id="userId" name="userId">
                                <option value=""></option>
                                <?php
                                foreach ($users as $user) {
                                    echo '<option value="' . $user["id"] . '">' . $user["name"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between flex-row">

                        <button class="btn btn-primary" type="submit" id="delete">Reset</button>
                        <button class="btn btn-primary" type="submit" name="search--">Tìm kiếm</button>
                    </div>
                </div>
            </div>
            <div class="count">
                <div class="student-found">
                    <p>Số bản ghi tìm thấy: <?php echo count($data) ?></p>
                </div>
            </div>
            <div class="list" style="
    display: grid;">
                <table class="student-table">
                    <tr class="header">
                        <th style="width:10%">No.</th>
                        <th style="width:20%">Tên sách</th>
                        <th style="width:30%">Thời gian dự kiến muộn</th>
                        <th style="width:30%">Thời điểm trả</th>
                        <th style="width:30%">Người mượn</th>
                    </tr>
                    <?php

                    for ($i = 0; $i < count($data); $i++) {
                        $books_name =  $data[$i]['books_name'];
                        // for ($j = $i; $j < count($data); $j++) {
                        //     if($books_name ==  $data[$j]['books_name']){

                        //     }
                        // }
                        // foreach($data as $item){
                        echo '
              <tr >
              <td style="width:10%">' . ($i + 1) . '</td>
              <td style="width:20%">' . $data[$i]['books_name'] . '</td>
              <td style="width:30%">' . $data[$i]['return_plan_date'] . '</td>
              <td style="width:30%">' . $data[$i]['return_actual_date'] . '</td>
              <td style="width:30%">' . $data[$i]['username'] . '</td>
              </tr> 
              ';
                    }
                    ?>
                </table>
            </div>

        </form>
    </div>

    <!-- Bootstrap -->
    <script type="text/javascript" src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js'></script>
    <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js'></script>
    <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/css/bootstrap.min.css' media="screen" />
    <!-- Bootstrap -->
    <!-- Bootstrap DatePicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap DatePicker -->
    <script type="text/javascript">
        $(function() {
            $('#txtDate').datepicker({
                format: "dd/mm/yyyy"
            });
        });
    </script>

</body>

</html>