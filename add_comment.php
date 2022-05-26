<?php

//add_comment.php

$connect = new PDO('mysql:host=localhost;dbname=test', 'root', '');

$error = '';
$comment_name = '';
$comment_content = '';
if(empty($_POST["comment_name"]))
{
 $error .= '<p class="text-danger"Nhập tên</p>';
}
else
{
 $comment_name = $_POST["comment_name"];
}

if(empty($_POST["comment_content"]))
{
 $error .= '<p class="text-danger">Nhập bình luận</p>';
}
else
{
 $comment_content = $_POST["comment_content"];
}

if($error == '')
{
 
 $query = "INSERT INTO tbl_comment (parent_comment_id, id, comment, comment_sender_name) VALUES (:parent_comment_id, :id, :comment, :comment_sender_name)";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':parent_comment_id' => $_POST["comment_id"],
   ':id' => $_POST["id"],
   ':comment'    => $comment_content,
   ':comment_sender_name' => $comment_name,
  )
 );
 $error = '<label class="text-success">Đã thêm bình luận</label>';
}

$data = array(
 'error'  => $error
);

echo json_encode($data);

?>
