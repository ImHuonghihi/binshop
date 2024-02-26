<?php

	$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
	$query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);

	// Truy vấn danh sách danh mục sản phẩm từ bảng tbl_danhmuc.
	//Dữ liệu được sắp xếp theo id_danhmuc giảm dần (DESC).
	

?>

<!-- Nếu có tham số dangxuat được truyền và có giá trị là 1, hủy phiên đăng ký bằng cách unset $_SESSION['dangky']. -->
<?php
	if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
		unset($_SESSION['dangky']);
	} 
?>


<div class="menu">

<!-- Hiển thị menu -->
<!-- Sử dụng một vòng lặp để hiển thị các mục menu dựa trên danh sách danh mục sản phẩm từ cơ sở dữ liệu.
Nếu người dùng đã đăng nhập (đã có phiên đăng ký), hiển thị các mục "Logout" và "Change password". Ngược lại, hiển thị mục "Register". -->
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
<!-- Hết hiển thị menu -->

			<p style="text-align: right;">
			<!-- Form tìm kiếm sản phẩm với ô nhập từ khóa (tukhoa) và nút "Tìm kiếm".
Khi người dùng nhấn nút "Tìm kiếm", form sẽ gửi dữ liệu đến trang index.php với tham số quanly=timkiem. -->
        <form action="index.php?quanly=timkiem" method="POST">
            <input type="text" placeholder="Tìm kiếm sản phẩm..." name="tukhoa">
            <input type="submit" name="timkiem" value="Tìm kiếm">
        </form>
    </p>
		</div>