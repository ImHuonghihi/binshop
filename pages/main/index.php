<?php
	if(isset($_GET['trang'])){
		$page = $_GET['trang'];
	}else{
		$page = 1;
	}
	if($page == '' || $page == 1){
		$begin = 0;
	}else{
		$begin = ($page*4)-4;
	}
	$sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC LIMIT $begin,4";
	$query_pro = mysqli_query($mysqli,$sql_pro);
	
?>
<h3>New products</h3>
<div class="product_rows">
    <ul class="product_list">
        <?php
        echo '<ul style="padding: 0; margin: 0; list-style: none; display: flex; flex-wrap: wrap;">';

        while($row = mysqli_fetch_array($query_pro)){ 
            echo '<li style="flex: 0 0 25% 25%; box-sizing: border-box; padding: 10px; text-align: center paddingBottom: 20px">';
            echo '<a href="index.php?quanly=sanpham&id=' . $row['id_sanpham'] . '" style="text-decoration: none; color: black; display: block;">';
            echo '<img src="admincp/modules/quanlysp/uploads/' . $row['hinhanh'] . '" style="width: 80%; height: auto; margin: 0 auto;">';
            echo '<p class="title_product" style="margin: 10px 0 5px; text-align: center; color: black;">' . $row['tensanpham'] . '</p>';
            echo '<p class="price_product" style="margin: 5px 0; text-align: center;">Giá : ' . number_format($row['giasp'], 0, ',', '.') . ' VND</p>';
            echo '</a>';
            echo '</li>';
        }

        echo '</ul>';
        ?>
    </ul>
</div>



				<div style="clear:both;"></div>
				<style type="text/css">
					ul.list_trang {
						ul.list_trang {
					padding: 0;
					margin: 10px 0;
					list-style: none;
					text-align: center;
			}

			ul.list_trang li {
					display: inline-block;
					margin: 5px;
					background: burlywood;
			}


					ul.list_trang li a {
					color: #000;
					text-align: center;
					text-decoration: none;
					}
				</style>
				<?php
				$sql_trang = mysqli_query($mysqli,"SELECT * FROM tbl_sanpham");
				$row_count = mysqli_num_rows($sql_trang);  
				$trang = ceil($row_count/3);
				?>
				<p>Trang hiện tại : <?php echo $page ?>/<?php echo $trang ?> </p>
				
				<ul class="list_trang">

				<?php
    echo '<ul class="list_trang" style="padding: 0; margin: 0; list-style: none; display: flex;">';

    for($i=1; $i<=$trang; $i++){ 
        echo '<li style="margin: 5px; background: burlywood; display: block;">';
        echo '<a href="index.php?trang=' . $i . '" style="color: #000; text-align: center; text-decoration: none; padding: 5px 13px; display: block;">' . $i . '</a>';
        echo '</li>';
    }

    echo '</ul>';
?>
				</ul>