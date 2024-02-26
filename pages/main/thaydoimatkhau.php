<?php
	if(isset($_POST['doimatkhau'])){
		$taikhoan = $_POST['email'];
		$matkhau_cu = md5($_POST['password_cu']);
		$matkhau_moi = md5($_POST['password_moi']);
		$sql = "SELECT * FROM tbl_dangky WHERE email='".$taikhoan."' AND matkhau='".$matkhau_cu."' LIMIT 1";
		$row = mysqli_query($mysqli,$sql);
		$count = mysqli_num_rows($row);
		if($count>0){
			$sql_update = mysqli_query($mysqli,"UPDATE tbl_dangky SET matkhau='".$matkhau_moi."'");
			echo '<p style="color:green">Mật khẩu đã được thay đổi."</p>';
		}else{
			echo '<p style="color:red">Tài khoản hoặc Mật khẩu cũ không đúng,vui lòng nhập lại."</p>';
		}
	} 
?>
<!-- Kiểm tra xem nút "Đổi mật khẩu" đã được nhấn hay chưa.
Lấy thông tin tài khoản, mật khẩu cũ và mật khẩu mới từ form.
Thực hiện truy vấn kiểm tra xem có tồn tại một bản ghi trong cơ sở dữ liệu có tài khoản và mật khẩu cũ khớp hay không.
Nếu khớp, thực hiện cập nhật mật khẩu mới cho tài khoản. -->

<form action="" autocomplete="off" method="POST">
		<table border="1" class="table-login" style="text-align: center;border-collapse: collapse;">
			<tr>
				<td colspan="2"><h3>Đổi mật khẩu Admin</h3></td>
			</tr>
			<tr>
				<td>Tài khoản</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td>Mật khẩu cũ</td>
				<td><input type="text" name="password_cu"></td>
			</tr>
			<tr>
				<td>Mật khẩu mới</td>
				<td><input type="text" name="password_moi"></td>
			</tr>
			<tr>
				
				<td colspan="2"><input type="submit" name="doimatkhau" value="Đổi mật khẩu"></td>
			</tr>
	</table>
	</form>

	<!-- Form sử dụng phương thức POST và không có action, nghĩa là sẽ gửi dữ liệu đến chính trang hiện tại khi submit.
Các trường nhập thông tin tài khoản, mật khẩu cũ và mật khẩu mới được đặt trong một bảng để hiển thị trên giao diện.
Các trường thông tin trong form:

Tài khoản, Mật khẩu cũ, và Mật khẩu mới được nhập thông qua các trường input trong form.
Xử lý kết quả đổi mật khẩu:

Nếu kiểm tra tài khoản và mật khẩu cũ khớp (count > 0), thực hiện cập nhật mật khẩu mới và hiển thị thông báo màu xanh lá cây.
Ngược lại, hiển thị thông báo màu đỏ thông báo rằng tài khoản hoặc mật khẩu cũ không đúng. -->