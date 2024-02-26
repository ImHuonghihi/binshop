<?php
	if(isset($_POST['dangnhap'])){
		$email = $_POST['email'];
		$matkhau = md5($_POST['password']);
		$sql = "SELECT * FROM tbl_dangky WHERE email='".$email."' AND matkhau='".$matkhau."' LIMIT 1";
		$row = mysqli_query($mysqli,$sql);
		$count = mysqli_num_rows($row);

		if($count>0){
			$row_data = mysqli_fetch_array($row);
			$_SESSION['dangky'] = $row_data['tenkhachhang'];
			$_SESSION['id_khachhang'] = $row_data['id_dangky'];
			header("Location:index.php?quanly=giohang");
		}else{
			echo '<p style="color:red">Mật khẩu hoặc Email sai ,vui lòng nhập lại.</p>';
			
		}
	} 
?>
<h3 style="font-size: 20px; margin-bottom: 10px;">Login</h3>

<form action="" autocomplete="off" method="POST">
		<table border="1" width="50%" class="table-login" style="text-align: center;border-collapse: collapse;">
			<tr>
			<td style="padding: 5px;">Email</td>
			<td style="padding: 5px;"><input type="text" style="width: 95%;" name="email"></td>
			</tr>
			<tr>
				<td style="padding: 5px;">Password</td>
				<td style="padding: 5px;"><input type="password" style="width: 95%;" name="password"></td>
			</tr>
			<td colspan="2" style="text-align: center;">
        <input type="submit" name="dangnhap" value="Log in" style="padding: 10px; background-color: #4CAF50; color: #fff; border: none; cursor: pointer; margin: 5px;">
    </td>	
	</table>
	</form>