<?php
if (isset($_POST['dangky'])) {
    $tenkhachhang = $_POST['hovaten'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $matkhau = md5($_POST['matkhau']);
    $diachi = $_POST['diachi'];

    // Kiểm tra nếu các trường bắt buộc không được nhập
    if (empty($tenkhachhang) || empty($email) || empty($dienthoai) || empty($matkhau) || empty($diachi)) {
        echo '<p style="color: red; margin-bottom: 10px;">Vui lòng nhập đầy đủ thông tin</p>';
    } else {
        // Tiến hành đăng ký nếu các trường bắt buộc đã được nhập
        $sql_dangky = mysqli_query($mysqli, "INSERT INTO tbl_dangky(tenkhachhang,email,diachi,matkhau,dienthoai) VALUES('" . $tenkhachhang . "','" . $email . "','" . $diachi . "','" . $matkhau . "','" . $dienthoai . "')");
        if ($sql_dangky) {
            echo '<p style="color: green; margin-bottom: 10px;">Bạn đã đăng ký thành công</p>';
            $_SESSION['dangky'] = $tenkhachhang;
            $_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);
            header('Location:index.php?quanly=giohang');
        }
    }
}
?>

<p style="font-size: 20px; margin-bottom: 10px;">Member registration</p>
<form action="" method="POST">
    <table class="dangky" border="1" width="50%" style="border-collapse: collapse;">
        <tr>
            <td style="padding: 5px;">User</td>
            <td style="padding: 5px;"><input type="text" style="width: 95%;" name="hovaten"></td>
        </tr>
        <tr>
            <td style="padding: 5px;">Email</td>
            <td style="padding: 5px;"><input type="text" style="width: 95%;" name="email"></td>
        </tr>
        <tr>
            <td style="padding: 5px;">Phone</td>
            <td style="padding: 5px;"><input type="text" style="width: 95%;" name="dienthoai"></td>
        </tr>
        <tr>
            <td style="padding: 5px;">Address</td>
            <td style="padding: 5px;"><input type="text" style="width: 95%;" name="diachi"></td>
        </tr>
        <tr>
            <td style="padding: 5px;">Password</td>
            <td style="padding: 5px;"><input type="text" style="width: 95%;" name="matkhau"></td>
        </tr>
        <tr>
    <td colspan="2" style="text-align: center;">
        <input type="submit" name="dangky" value="Register" style="padding: 10px; background-color: #4CAF50; color: #fff; border: none; cursor: pointer; margin: 5px;">
        <a href="index.php?quanly=dangnhap" style="padding: 10px; background-color: #337ab7; color: #fff; text-decoration: none; margin: 5px; display: inline-block;">Log in if you have an account</a>
    </td>
</tr>

    </table>
</form>
