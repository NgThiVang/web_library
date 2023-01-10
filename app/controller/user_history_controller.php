<?php
    require "../model/bookPhpAdminClient.php";
    require "../model/userPhpAdminClient.php";
    $result = [];
		$araryParagraph = [];
    $list_book = deBook();
    if($_SERVER['REQUEST_METHOD'] == "GET"){

        if (isset($_GET["search"])) {
                if(isset($_GET['user_id'])){
                    $user_id = $_GET['user_id'];
                }
                if(isset($_GET['book_id'])){
                    $book_id = $_GET['book_id'];
                }
                $result = history_transaction($user_id, $book_id);
        }
				if(isset($_GET["reset"])){
					$_GET['user_id']="";
					$_GET['book_id']="";
				}
    }

    function formatDate($date)
    {
        $date = date('Y-m-d h:i:s', strtotime($date));
        $new_date = date('h:i d/m/Y', strtotime($date));
        return $new_date;
    }
?>