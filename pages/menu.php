<?php

	$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
	$query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
	
	    		
?>
<?php
	if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
		unset($_SESSION['dangky']);
	} 
?>
<div class="menu">
			<ul class="list_menu">
				<li><a href="index.php">Homepage</a></li>
				<?php 
				while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
				?>
				<li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a></li>
				<?php
				} 
				?>
				
				<li><a href="index.php?quanly=tintuc">News</a></li>
				<li><a href="index.php?quanly=giohang">Cart</a></li>
				<li><a href="index.php?quanly=lienhe">Contact</a></li>
				<?php
				if(isset($_SESSION['dangky'])){ 

				?>
				<li><a href="index.php?dangxuat=1">Logout</a></li>
				<li><a href="index.php?quanly=thaydoimatkhau">Change password</a></li>
				<?php
				}else{ 
				?>
				<li><a href="index.php?quanly=dangky">Register</a></li>
				<?php
				} 
				?>
				
					
				
			</ul>
			<p style="text-align: right;">
        <form action="index.php?quanly=timkiem" method="POST">
            <input type="text" placeholder="Tìm kiếm sản phẩm..." name="tukhoa">
            <input type="submit" name="timkiem" value="Tìm kiếm">
        </form>
    </p>
		</div>