<?php
    session_start();
    $noidung = $_POST['noidung'];
    $productid = $_POST['productid'];
    

    $ketnoi = mysqli_connect("localhost", "root", "", "test");
    $sql = "INSERT INTO binhluan(productid, noidung,) VALUES ('$productid', '$noidung', )";
    $ketqua = mysqli_query($ketnoi, $sql);
    echo "Đã bình luận";

?>