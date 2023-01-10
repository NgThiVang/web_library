<?php
	require '../common/connectDB.php';
    
	$sqlRoom = 'SELECT * FROM `books`';
    $listRoom = $conn ->query($sqlRoom);
    $listRoom -> execute();
		function deBook(){
			require '../common/connectDB.php';
			
			$sql1 = 'SELECT * FROM `books`';
			$listTeacher = $conn->query($sql1);
			$listTeacher->execute();
			return $listTeacher;
			}
    function get_room($id){
        
        require '../common/connectDB.php';
        if($id !=NULL){
            $sql = "SELECT * FROM `books` WHERE id=$id ";
            $getData = $conn -> prepare($sql);
            $getData->execute();
            $getData->setFetchMode(PDO::FETCH_ASSOC); 
            $resultUser = $getData->fetchAll();
           return $resultUser;
        };
    }
		function editBook($id,$name,$category,$author,$quantity,$avatar,$description,$update){
			 require '../common/connectDB.php';
        if($id !=NULL){
            $sql = "UPDATE `books` SET `name`='$name',`category`='$category',`author`='$author',`quantity`='$quantity',`avatar`='$avatar',`description`='$description',`updated`='$update',`created`='' WHERE id=$id";            
						$update = $conn -> prepare($sql);
            $update->execute();
        };
		}
    function getLastIDR(){
        global $conn;
        $idT=0;
        $query = $conn ->prepare("SELECT * FROM `books` WHERE id=(SELECT max(id) FROM `books`)");
        $query -> execute();
        foreach ($query as $id) {
           $idT= $id['id'];
        }
        return $idT+1;
    }
?>