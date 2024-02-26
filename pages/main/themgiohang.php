<?php
	session_start();
	include('../../admincp/config/config.php');
	//them so luong
	if(isset($_GET['cong'])){
		$id=$_GET['cong'];
		foreach($_SESSION['cart'] as $cart_item){
			if($cart_item['id']!=$id){
				$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
				$_SESSION['cart'] = $product;
			}else{
				$tangsoluong = $cart_item['soluong'] + 1;
				if($cart_item['soluong']<=9){
					
					$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$tangsoluong,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
				}else{
					$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
				}
				$_SESSION['cart'] = $product;
			}
			
		}
		header('Location:../../index.php?quanly=giohang');
	}

// Xử lý việc tăng số lượng của một sản phẩm trong giỏ hàng.
//Kiểm tra nếu số lượng sản phẩm không vượt quá 9 (điều kiện kiểm tra $cart_item['soluong'] <= 9).
//Cập nhật giỏ hàng và chuyển hướng người dùng đến trang giỏ hàng.


	//tru so luong
	if(isset($_GET['tru'])){
		$id=$_GET['tru'];
		foreach($_SESSION['cart'] as $cart_item){
			if($cart_item['id']!=$id){
				$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
				$_SESSION['cart'] = $product;
			}else{
				$tangsoluong = $cart_item['soluong'] - 1;
				if($cart_item['soluong']>1){
					
					$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$tangsoluong,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
				}else{
					$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
				}
				$_SESSION['cart'] = $product;
			}
			
		}
		header('Location:../../index.php?quanly=giohang');
	}

// Xử lý việc giảm số lượng của một sản phẩm trong giỏ hàng.
// Kiểm tra nếu số lượng sản phẩm lớn hơn 1.
// Cập nhật giỏ hàng và chuyển hướng người dùng đến trang giỏ hàng.

	//xoa san pham
	if(isset($_SESSION['cart'])&&isset($_GET['xoa'])){
		$id=$_GET['xoa'];
		foreach($_SESSION['cart'] as $cart_item){

			if($cart_item['id']!=$id){
				$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
			}

		$_SESSION['cart'] = $product;
		header('Location:../../index.php?quanly=giohang');
		}
	}

// 	Xử lý việc xóa một sản phẩm khỏi giỏ hàng.
// Cập nhật giỏ hàng và chuyển hướng người dùng đến trang giỏ hàng.


	//xoa tat ca
	if(isset($_GET['xoatatca'])&&$_GET['xoatatca']==1){
		unset($_SESSION['cart']);
		header('Location:../../index.php?quanly=giohang');
	}


	//them sanpham vao gio hang
	if(isset($_POST['themgiohang'])){ 
		// Kiểm tra xem nút "Thêm vào giỏ hàng" đã được nhấn hay chưa.
		//session_destroy();
		$id=$_GET['idsanpham'];
		$soluong=1;
		$sql ="SELECT * FROM tbl_sanpham WHERE id_sanpham='".$id."' LIMIT 1";
		$query = mysqli_query($mysqli,$sql);
		$row = mysqli_fetch_array($query);
		// Lấy ID sản phẩm từ URL ($_GET['idsanpham']).
// Thiết lập số lượng sản phẩm là 1.
// Truy vấn cơ sở dữ liệu để lấy thông tin chi tiết của sản phẩm dựa trên ID.
		if($row){
			$new_product=array(array('tensanpham'=>$row['tensanpham'],'id'=>$id,'soluong'=>$soluong,'giasp'=>$row['giasp'],'hinhanh'=>$row['hinhanh'],'masp'=>$row['masp']));
			//kiem tra session gio hang ton tai
			if(isset($_SESSION['cart'])){
				$found = false;
				foreach($_SESSION['cart'] as $cart_item){
					//neu du lieu trung
					if($cart_item['id']==$id){
						$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$soluong+1,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
						$found = true;
					}else{
						//neu du lieu khong trung
						$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
					}
				}
				if($found == false){
					//lien ket du lieu new_product voi product
					$_SESSION['cart']=array_merge($product,$new_product);
				}else{
					$_SESSION['cart']=$product;
				}
			}else{
				$_SESSION['cart'] = $new_product;
			}
			// Kiểm tra xem thông tin sản phẩm đã được lấy từ cơ sở dữ liệu hay chưa.
			// Tạo một mảng mới chứa thông tin của sản phẩm mới cần thêm vào giỏ hàng.
			// Kiểm tra xem giỏ hàng đã được khởi tạo trước đó hay chưa.
			// Nếu giỏ hàng đã tồn tại:
			// Duyệt qua từng sản phẩm trong giỏ hàng.
			// Nếu tìm thấy sản phẩm trùng khớp, tăng số lượng sản phẩm.
			// Nếu không tìm thấy sản phẩm trùng khớp, thêm sản phẩm mới vào giỏ hàng.
			// Nếu giỏ hàng chưa tồn tại, tạo giỏ hàng mới với sản phẩm đầu tiên.
		}
		header('Location:../../index.php?quanly=giohang');
		// Sau khi xử lý xong, chuyển hướng người dùng đến trang giỏ hàng.
	}
	
	
	
?>