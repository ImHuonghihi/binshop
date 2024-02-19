<?php
	$sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc='$_GET[id]' ORDER BY id_sanpham DESC";
	$query_pro = mysqli_query($mysqli,$sql_pro);
	//get ten danh muc
	$sql_cate = "SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.id_danhmuc='$_GET[id]' LIMIT 1";
	$query_cate = mysqli_query($mysqli,$sql_cate);
	$row_title = mysqli_fetch_array($query_cate);
?>
<h3>Category: <span style="color: red;"><?php echo $row_title['tendanhmuc'] ?></span></h3>

				<ul class="product_list">
					<?php
					while($row_pro = mysqli_fetch_array($query_pro)){ 
					?>
					<li>
						<a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>">
							<img src="admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>">
							<p class="title_product"><?php echo $row_pro['tensanpham'] ?></p>
							<p class="price_product" style="margin: 5px 0; text-align: center;">Giá : <?php echo number_format($row_pro['giasp'],0,',','.').' VND' ?></p>
							<p class="description" style="margin: 5px 0; text-align: center; color: black"><?php echo $row_pro['tomtat'] ?></p>
						</a>
					</li>
					<?php
					} 
					?>

<?php
    echo '<ul style="padding: 0; margin: 0; list-style: none; display: flex; flex-wrap: wrap;">';

    while($row = mysqli_fetch_array($query_pro)){ 
        echo '<li style="flex: 0 0 25% 25%; box-sizing: border-box; padding: 10px; text-align: center paddingBottom: 20px">';
        echo '<a href="index.php?quanly=sanpham&id=' . $row['id_sanpham'] . '" style="text-decoration: none; color: black; display: block;">';
        echo '<img src="admincp/modules/quanlysp/uploads/' . $row['hinhanh'] . '" style="width: 80%; height: auto; margin: 0 auto;">';
        echo '<p class="title_product" style="margin: 10px 0 5px; text-align: center; color: black;">' . $row['tensanpham'] . '</p>';
        echo '<p class="price_product" style="margin: 5px 0; text-align: center;">Giá : ' . number_format($row['giasp'], 0, ',', '.') . ' VND</p>';
        echo '<p class="description" style="margin: 5px 0; text-align: center;">Description: ' . $row_pro['tomtat'] . '</p>';
        
				echo '</a>';
        echo '</li>';
    }

    echo '</ul>';
?>
					
				</ul>