<p style="font-size: 18px; font-weight: bold;">Thêm sản phẩm</p>
<table border="1" width="100%" style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlysp/xuly.php" enctype="multipart/form-data">
        <tr>
            <td style="padding: 10px; width: 150px;">Tên sản phẩm</td>
            <td><input type="text" name="tensanpham" style="width: calc(100% - 22px); padding: 5px; box-sizing: border-box;"></td>
        </tr>
        <tr>
            <td style="padding: 10px; width: 150px;">Mã sp</td>
            <td><input type="text" name="masp" style="width: calc(100% - 22px); padding: 5px; box-sizing: border-box;"></td>
        </tr>
        <tr>
            <td style="padding: 10px; width: 150px;">Giá sp</td>
            <td><input type="text" name="giasp" style="width: calc(100% - 22px); padding: 5px; box-sizing: border-box;"></td>
        </tr>
        <tr>
            <td style="padding: 10px; width: 150px;">Số lượng</td>
            <td><input type="text" name="soluong" style="width: calc(100% - 22px); padding: 5px; box-sizing: border-box;"></td>
        </tr>
        <tr>
            <td style="padding: 10px; width: 150px;">Hình ảnh</td>
            <td><input type="file" name="hinhanh" style="width: calc(100% - 22px); padding: 5px; box-sizing: border-box;"></td>
        </tr>
        <tr>
            <td style="padding: 10px; width: 150px;">Tóm tắt</td>
            <td><textarea rows="5" name="tomtat" style="width: calc(100% - 22px); padding: 5px; resize: none; box-sizing: border-box;"></textarea></td>
        </tr>
        <tr>
            <td style="padding: 10px; width: 150px;">Nội dung</td>
            <td><textarea rows="5" name="noidung" style="width: calc(100% - 22px); padding: 5px; resize: none; box-sizing: border-box;"></textarea></td>
        </tr>
        <tr>
            <td style="padding: 10px; width: 150px;">Danh mục sản phẩm</td>
            <td>
                <select name="danhmuc" style="width: calc(100% - 22px); padding: 5px; box-sizing: border-box;">
                    <?php
                    $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                    $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                    while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                    ?>
                        <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td style="padding: 10px; width: 150px;">Tình trạng</td>
            <td>
                <select name="tinhtrang" style="width: calc(100% - 22px); padding: 5px; box-sizing: border-box;">
                    <option value="1">Kích hoạt</option>
                    <option value="0">Ẩn</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center; padding: 10px;"><input type="submit" name="themsanpham" value="Thêm sản phẩm" style="padding: 8px; font-size: 16px;"></td>
        </tr>
    </form>
</table>
