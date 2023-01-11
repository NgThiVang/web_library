<?php
require '../common/connectDB.php';

$sqlUser = 'SELECT * FROM `users`';
$listUser = $conn->prepare($sqlUser);
$listUser->execute();
function history_transaction($user_id, $book_id)
{
	require '../common/connectDB.php';
	$querys = '';
	if ($book_id == '' && $user_id == '') {
		$querys = "SELECT  users.id as users_id,
					users.name as users_name, 
					book_transactions.brrowed_date as borrowed_date,
					book_transactions.return_plan_date as return_plan_date,
					book_transactions.return_actual_date as return_actual_date,
					books.name as books_name 
					FROM `book_transactions`,`users`,`books` 
					WHERE users.id = book_transactions.user_id AND book_transactions.book_id = books.id";
	} else if ($book_id == '') {
		$querys = "SELECT users.id as users_id, 
											users.name as users_name, 
											book_transactions.brrowed_date as borrowed_date,
											book_transactions.return_plan_date as return_plan_date,
											book_transactions.return_actual_date as return_actual_date,
											books.name as books_name 
							FROM `book_transactions`,`users`,`books` 
							WHERE users.id LIKE '%" . $user_id . "%' AND users.id = book_transactions.user_id AND book_transactions.book_id = books.id";
	} else if ($user_id == '') {
		$querys = "SELECT users.id as users_id, 
											users.name as users_name, 
											book_transactions.brrowed_date as borrowed_date,
											book_transactions.return_plan_date as return_plan_date,
											book_transactions.return_actual_date as return_actual_date,
											books.name as books_name 
							FROM `book_transactions`,`users`,`books`  
					WHERE book_id =" . $book_id . " AND users.id = book_transactions.user_id AND book_transactions.book_id = books.id";
	} else {
			$querys = "SELECT  users.id as users_id,
			users.name as users_name, 
			book_transactions.brrowed_date as borrowed_date,
			book_transactions.return_plan_date as return_plan_date,
			book_transactions.return_actual_date as return_actual_date,
			books.name as books_name 
			FROM `book_transactions`,`users`,`books` 
			WHERE book_id =".$book_id." AND users.id LIKE '%".$user_id."%' AND users.id = book_transactions.user_id AND book_transactions.book_id = books.id";
	}
	$sql = $conn->prepare($querys);
	$sql->execute();
	$result = $sql->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}


?>
