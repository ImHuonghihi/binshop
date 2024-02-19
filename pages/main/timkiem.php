<?php
    if (isset($_POST['timkiem'])) {
        $tukhoa = $_POST['tukhoa'];
    }
    $sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.tensanpham LIKE '%" . $tukhoa . "%'";
    $query_pro = mysqli_query($mysqli, $sql_pro);

    $style_li = "width: 30%; margin: 10px 0; border: 1px solid #ddd; border-radius: 8px; padding: 10px; background-color: #fff;";
    $style_a = "text-decoration: none; color: #333; transition: color 0.3s ease-in-out;";
    $style_a_hover = "color: #0A263C;";
		$style_img = "max-width: 100%; height: auto;";
    $style_title_product = "font-size: 16px; font-weight: bold; margin: 5px 0;";
    $style_price_product = "font-size: 14px; color: red; margin: 5px 0;";

    echo '<h3 style="font-size: 28px; text-align: center; color: #333; margin: 20px 0;">Từ khoá tìm kiếm : ' . $_POST['tukhoa'] . '</h3>';
    echo '<ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-wrap: wrap; justify-content: space-around;">';

    while ($row = mysqli_fetch_array($query_pro)) {
        echo '<li style="' . $style_li . '">';
        echo '<a href="index.php?quanly=sanpham&id=' . $row['id_sanpham'] . '" style="' . $style_a . '" onmouseover="this.style=\'' . $style_a_hover . '\'" onmouseout="this.style=\'' . $style_a . '\'">';
				echo '<img src="admincp/modules/quanlysp/uploads/' . $row['hinhanh'] . '" style="max-width: 100%; height: auto;">';
        echo '<p class="title_product" style="' . $style_title_product . '">Tên sản phẩm : ' . $row['tensanpham'] . '</p>';
        echo '<p class="price_product" style="' . $style_price_product . '">Giá : ' . number_format($row['giasp'], 0, ',', '.') . 'vnđ</p>';
        echo '<p style="text-align: center;color:black">' . $row['tendanhmuc'] . '</p>';
        echo '</a>';
        echo '</li>';
    }

    echo '</ul>';
?>


				