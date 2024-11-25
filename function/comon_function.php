<?php

include './connect.php';
$conn = connectdb();


function getSanPham()
{
    global $conn;
    $select_query = "SELECT * FROM sanpham order by rand()";
    $stmt = $conn->prepare($select_query);
    $stmt->execute();

    // Lấy kết quả và hiển thị
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $ma = $row['ma_san_pham'];
        $ten = $row['ten_san_pham'];
        $mota = $row['mo_ta'];
        $gia = $row['gia'];
        $anh = $row['anh_url'];
        $math = $row['ma_thuong_hieu'];
        $madm = $row['ma_danh_muc'];

        echo '
<div class="col-md-4 mb-2">
<div class="card">
<img src="./image/' . htmlspecialchars($anh) . '" class="card-img-top" alt="' . htmlspecialchars($ten) . '">
<div class="card-body">
    <h5 class="card-title">' . htmlspecialchars($ten) . '</h5>
    <p class="card-text">' . htmlspecialchars($mota) . '</p>
    <a href="#" class="btn btn-info">Thêm giỏ hàng</a>
    <a href="#" class="btn btn-secondary">Chi tiết</a>
</div>
</div>
</div>';
    }
}


function getThuongHieu()
{
    global $conn;
    $stm = $conn->query('select * from thuonghieu');
    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($data);
    foreach ($data as $item) {
?>
        <li><a href="#" class="nav-link text-light"><?php echo $item['ten_thuong_hieu'] ?></a></li>
<?php
    }
}


function getDanhMuc(){
    global $conn;
    $stm = $conn->query('select * from danhmuc');

    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($data);
    foreach ($data as $item) {

    ?>
        <li><a href="#" class="nav-link text-light"><?php echo $item['ten_danh_muc'] ?></a></li>
    <?php
    }
}

// tiếp bài 19

?>